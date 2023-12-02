<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day2;

class Game
{
	/**
	 * @var CubeSet[]
	 */
	private array $cubeSets = [];

	public function __construct(
		public readonly int $game_id,
	) {}

	public function addSet(CubeSet $cubeSet): void
	{
		$this->cubeSets[] = $cubeSet;
	}

	public function getMinimumCubset(): CubeSet
	{
		$green = 0;
		$red = 0;
		$blue = 0;
		foreach ($this->cubeSets as $set) {
			$green = max($green, $set->green);
			$red = max($red, $set->red);
			$blue = max($blue, $set->blue);
		}

		return new CubeSet(green: $green, red: $red, blue: $blue);
	}

	public function isGamePossible(CubeSet $maxCubeSet): bool
	{
		foreach ($this->cubeSets as $set) {
			if ($set->blue > $maxCubeSet->blue) {
				return false;
			}
			if ($set->red > $maxCubeSet->red) {
				return false;
			}
			if ($set->green > $maxCubeSet->green) {
				return false;
			}
		}

		return true;
	}
}
