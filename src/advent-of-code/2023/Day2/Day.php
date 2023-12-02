<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day2;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getSumPlayableGames(CubeSet $config): int
	{
		$sum = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$game = $this->getGameFromString($line);
			if (!$game) {
				continue;
			}

			if ($game->isGamePossible($config)) {
				$sum += $game->game_id;
			}
		}

		return $sum;
	}

	public function getSumPowersOfMiniumCubeSets(): int
	{
		$sum = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$game = $this->getGameFromString($line);
			if (!$game) {
				continue;
			}

			$sum += $game->getMinimumCubset()->getPower();
		}

		return $sum;
	}

	private function getGameFromString(string $row): ?Game
	{
		if (!preg_match('/^Game (\d+):(.*)$/', $row, $match)) {
			return null;
		}

		$game = new Game((int) $match[1]);
		$sets = explode(';', $match[2]);

		foreach ($sets as $set) {
			$moves = explode(',', $set);
			$green = 0;
			$red = 0;
			$blue = 0;
			foreach ($moves as $move) {
				preg_match('/(\d+)\s*(blue|red|green)/', $move, $matches);
				if ($matches[2] === 'green') {
					$green = (int) $matches[1];
				}

				if ($matches[2] === 'blue') {
					$blue = (int) $matches[1];
				}

				if ($matches[2] === 'red') {
					$red = (int) $matches[1];
				}
			}

			$game->addSet(new CubeSet(green: $green, red: $red, blue: $blue));
		}

		return $game;
	}
}
