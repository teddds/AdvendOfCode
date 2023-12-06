<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day5;

use AdventOfCode\Y2023\Day4\Map;
use AdventOfCode\Y2023\Day4\MapCollection;
use AdventOfCode\Y2023\Day4\Range;
use AdventOfCode\Y2023\Day4\Seeds;
use Generator;
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

		$s = new Seeds(function (): Generator {
			for ($i = 0, $iMax = count($this->seeds->seeds); $i < $iMax; $i += 2) {
				$start = $this->seeds->seeds[$i];
				$length = $this->seeds->seeds[$i + 1];
				$end = $start + $length;

				for ($k = $start; $k < $end; ++$k) {
					yield $k;
				}
			}
		});

		return $this->collection->getMinLocation($s);
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
					new Range(...array_map(static fn (string $item) => (int) $item, explode(' ', $row)), map: $map)
				);
			}
		}
		if ($map) {
			$this->collection->addMap($map);
		}
	}
}
