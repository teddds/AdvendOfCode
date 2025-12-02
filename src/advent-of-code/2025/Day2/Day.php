<?php
declare(strict_types=1);

namespace AdventOfCode\Y2025\Day2;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getSumInvalidIDsPart1(): int
	{
		return $this->getSumOfInvalidIDs(static fn (MaxPeriodDetector $detector) => $detector->getMaxPeriodCount() === 2);
	}

	public function getSumInvalidIDsPart2(): int
	{
		return $this->getSumOfInvalidIDs(static fn (MaxPeriodDetector $detector) => $detector->getMaxPeriodCount() >= 2);
	}

	private function getSumOfInvalidIDs(callable $comparison): int
	{
		$sumInvalidIDs = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$pairs = explode(',', $line);
			foreach ($pairs as $pair) {
				$ids = array_map(static fn (string $id) => (int) $id, explode('-', trim($pair)));
				for ($i = $ids[0]; $i <= $ids[1]; ++$i) {
					$checker = new MaxPeriodDetector((string) $i);
					if ($comparison($checker)) {
						$sumInvalidIDs += $i;
					}
				}
			}
		}

		return $sumInvalidIDs;
	}
}
