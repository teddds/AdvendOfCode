<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day5;

use Generator;
use LogicException;

class MapCollection
{
	private array $cache = [];

	/**
	 * @param Map[] $maps
	 */
	public function __construct(
		private array $maps = [],
	) {}

	public function addMap(Map $map)
	{
		$this->maps[$map->from] = $map;
	}

	public function getMap(string $from): ?Map
	{
		return $this->maps[$map->from] ?? null;
	}

	public function getMinLocation(Seeds $seeds): int
	{
		$min = 10000000000000000;

		foreach ($seeds->getNextSeed() as $seed) {
			$location = $this->runThroughMaps('seed', $seed, 'location');
			$min = min($location, $min);
		}

		return $min;
	}

	/**
	 * @return Generator<Map>
	 */
	public function from(string $from): Generator
	{
		$toYield = false;
		foreach ($this->maps as $map) {
			if ($map->from === $from) {
				$toYield = true;
			}
			if ($toYield) {
				yield $map;
			}
		}
	}

	private function runThroughMaps(string $from, int $seed, string $to): int
	{
		$map = $this->maps[$from] ?? null;
		if (!$map) {
			throw new LogicException('Map does not exist.');
		}

		$nextDest = $map->getNextDestinationNumber($seed);

		if ($map->to === $to) {
			return $nextDest;
		}

		return $this->runThroughMaps($map->to, $nextDest, $to);
	}
}
