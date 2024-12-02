<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day3;

use Generator;
use Utils;

class RucksackReader
{
	private array $map;

	public function __construct(private string $path)
	{
		$azl = range('a', 'z');
		$azlp = range(1, 26);
		$azu = range('A', 'Z');
		$azup = range(27, 52);

		$this->map = array_combine(array_merge($azl, $azu), array_merge($azlp, $azup));
	}

	public function getScore(bool $part2 = false): int
	{
		$score = 0;

		foreach ($this->getRow($part2) as $points) {
			$score += $points;
		}

		return $score;
	}

	private function getRow(bool $part2 = false): Generator
	{
		$tmp = [];
		foreach (Utils::readFile($this->path) as $row) {
			$row = trim($row);

			if ($part2) {
				$tmp[] = str_split($row);
				if (count($tmp) === 3) {
					yield $this->map[$this->findSameCharIn($tmp)];
					$tmp = [];
				}
			} else {
				$arrays = $this->getGroupsOfOneLine($row);
				yield $this->map[$this->findSameCharIn($arrays)];
			}
		}
	}

	private function getGroupsOfOneLine(string $row): array
	{
		$lengthSegment = strlen($row) / 2;
		$firstHalf = substr($row, 0, $lengthSegment);
		$secondHalf = substr($row, $lengthSegment);

		return [str_split($firstHalf), str_split($secondHalf)];
	}

	private function findSameCharIn($arrays): string
	{
		return current(array_intersect(...$arrays));
	}
}
