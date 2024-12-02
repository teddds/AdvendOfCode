<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day4;

use Generator;
use Utils;

class CampCleanerReader
{
	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	private array $map;

	public function __construct(private ?string $path = null)
	{
		$this->path ??= self::INPUT;
	}

	public function getCountFullyContaindAssigmentPairs(bool $part2 = false): int
	{
		$score = 0;

		$list = [];
		foreach ($this->getRow($part2) as $points) {
			$score += $points;
		}

		return $score;
	}

	private function getRow(bool $part2 = false): Generator
	{
		foreach (Utils::readFile($this->path) as $row) {
			$row = trim($row);
			[$a, $b] = explode(',', $row);

			$ra = $this->getRange($a);
			$rb = $this->getRange($b);

			if ($part2) {
				if (count(array_intersect($ra, $rb)) !== 0) {
					yield 1;
				}
			} else {
				if (count(array_diff($ra, $rb)) === 0 || (count(array_diff($rb, $ra)) === 0)) {
					yield 1;
				}
			}
		}
	}

	private function getRange(string $input): array
	{
		[$start, $end] = explode('-', $input);

		return range($start, $end);
	}
}
