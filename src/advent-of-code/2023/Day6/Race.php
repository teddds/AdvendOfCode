<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day6;

final class Race
{
	public function __construct(
		public readonly int $milliseconds,
		public readonly int $distance,
	) {}

	public function getBetterPossibilities(): array
	{
		$better = [];
		$range = range(1, $this->milliseconds);
		foreach ($range as $timetoAccelerate) {
			$distance = Calculator::getLinearDistance($timetoAccelerate, $this->milliseconds);
			if ($distance > $this->distance) {
				$better[] = $distance;
			}
		}

		return $better;
	}
}
