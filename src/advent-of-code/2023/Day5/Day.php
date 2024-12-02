<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day5;

use Utils;

final class Day
{
	private ?Seeds $seeds = null;

	private MapCollection $collection;

	public function __construct(private readonly string $inputPath)
	{
		$this->collection = new MapCollection();
	}

	public function getLowestLocationNumber(): int
	{
		$this->readInput();

		return $this->collection->getMinLocation($this->seeds);
	}

	public function getLowesLocationNumberFromSeedRanges(): int
	{
		$this->readInput();

		$r = [];
		$stacks = [];
		for ($i = 0, $iMax = count($this->seeds->seeds); $i < $iMax; $i += 2) {
			$start = $this->seeds->seeds[$i];
			$length = $this->seeds->seeds[$i + 1];
			$stacks[] = new Stack(
				'seed',
				new SimpleRange($start, $start + $length - 1)
			);
		}

		while (!empty($stacks)) {
			/** @var Stack $stack */
			$stack = array_pop($stacks);
			$range = $stack->range;

			// we have a location
			if ($stack->from === 'location') {
				if ($range->start > 0) {
					$r[] = $range->start;
				}
				continue;
			}

			foreach ($this->collection->from($stack->from) as $map) {
				foreach ($map->ranges as $mapRange) {
					if (
						$range->start <= $mapRange->sourceRangeEnd - 1
						&& $mapRange->sourceRangeStart <= $range->end
					) {
						// publish intersection to the next map
						$shift = $mapRange->destinationRangeStart - $mapRange->sourceRangeStart;
						$matchedRange = [
							max($range->start, $mapRange->sourceRangeStart),
							min($range->end, $mapRange->sourceRangeEnd - 1),
						];
						$stacks[] = new Stack(
							$map->to,
							new SimpleRange(
								$matchedRange[0] + $shift,
								$matchedRange[1] + $shift,
							),
						);

						// publish unmatched parts of the range again
						if ($range->start < $matchedRange[0]) {
							$stacks[] = new Stack(
								$stack->from,
								new SimpleRange($range->start, $matchedRange[0] - 1),
							);
						}

						if ($range->end > $matchedRange[1]) {
							$stacks[] = new Stack(
								$stack->from,
								new SimpleRange($matchedRange[1] + 1, $range->end),
							);
						}

						continue 3;
					}
				}

				// if we reach this point, it means this range has no match in the current map, publish to next map with the same range
				$stacks[] = new Stack($map->to, $range);
			}
		}

		return min($r);
	}

	private function readInput(): void
	{
		$firstLineProcessed = false;
		$rows = [];
		foreach (Utils::readFile($this->inputPath) as $line) {
			if ($firstLineProcessed === false) {
				$this->createSeedsFromRow($line);
				$firstLineProcessed = true;
			} elseif (empty($line)) {
				if (!empty($rows)) {
					$this->createMapFromRows($rows);
				}
				$rows = [];
			} else {
				$rows[] = $line;
			}
		}

		if (!empty($rows)) {
			$this->createMapFromRows($rows);
		}
	}

	private function createSeedsFromRow(string $seed): void
	{
		$this->seeds = new Seeds(
			array_values(array_map(static fn (string $item) => (int) trim($item), array_filter(explode(' ', str_replace('seeds:', '', $seed)))))
		);
	}

	private function createMapFromRows(array $rows): void
	{
		$firstLineProcessed = false;
		$map = null;
		foreach ($rows as $row) {
			if ($firstLineProcessed === false) {
				preg_match('/^([a-z]+)-to-([a-z]+) map:$/', $row, $match);
				$map = new Map($match[1], $match[2], $this->collection);
				$firstLineProcessed = true;
			} else {
				$map->addRange(
					new Range(...array_map(static fn (string $item) => (int) $item, explode(' ', $row)))
				);
			}
		}
		if ($map) {
			$this->collection->addMap($map);
		}
	}
}
