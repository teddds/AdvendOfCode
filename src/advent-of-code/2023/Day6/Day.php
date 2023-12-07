<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day6;

use Utils;

final class Day
{
	/** @var Race[] */
	private array $races = [];

	public function __construct(private readonly string $inputPath) {}

	public function getMultiplyOfBeatenRecords(): int
	{
		$this->readInput();
		$tmp = [];
		foreach ($this->races as $race) {
			$tmp[] = count($race->getBetterPossibilities());
		}

		return array_reduce($tmp, static fn ($a, $b) => $a * $b, 1);
	}

	public function getSumBeatenRecords(): int
	{
		$this->readInput(fn (string $line) => str_replace(' ', '', $line));
		$race = current($this->races);

		return count($race->getBetterPossibilities());
	}

	private function readInput(?callable $prepareLine = null): void
	{
		$rows = [];
		foreach (Utils::readFile($this->inputPath) as $line) {
			if ($prepareLine) {
				$line = $prepareLine($line);
			}
			preg_match_all('/\d+/', $line, $matches);
			$rows[] = array_map(static fn (string $item) => (int) $item, array_filter($matches[0]));
		}
		$races = [];
		foreach ($rows[0] as $key => $element) {
			$races[] = new Race($element, $rows[1][$key]);
		}

		$this->races = $races;
	}
}
