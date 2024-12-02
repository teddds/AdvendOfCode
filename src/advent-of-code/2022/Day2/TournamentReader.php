<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day2;

use Generator;
use Utils;

class TournamentReader
{
	public function __construct(private string $path) {}

	public function getScore(bool $part2 = false): int
	{
		$score = 0;

		/** @var SteinScherePapier[] $vars */
		foreach ($this->getRow($part2) as $vars) {
			[$a, $b] = $vars;
			$score += $a->beatAndScore($b);
		}

		return $score;
	}

	private function getRow(bool $part2 = false): Generator
	{
		foreach (Utils::readFile($this->path) as $row) {
			$tmp = str_split($row);
			$enemy = SteinScherePapier::fromInput($tmp[0]);
			$yours = SteinScherePapier::fromResponse($tmp[2]);

			if ($part2) {
				$yours = SteinScherePapier::fromInputAndDeservedOperation($enemy, $tmp[2]);
			}

			yield [$enemy, $yours];
		}
	}
}
