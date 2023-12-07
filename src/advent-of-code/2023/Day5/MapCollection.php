<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

use LogicException;

class MapCollection
{
	private array $seedsDone = [];

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

	public function getMinLocation(Seeds $seeds): int
	{
		$min = 10000000000000000;

		foreach ($seeds->getNextSeed() as $seed) {
			if (isset($this->seedsDone[$seed])) {
				continue;
			}
			$location = $this->runThroughMaps('seed', $seed, 'location');
			$min = min($location, $min);
			$seedsDone[$seed] = $location;
		}

		return $min;
	}

	public function getMap(string $from): ?Map
	{
		return $this->maps[$from] ?? null;
	}

	private function runThroughMaps(string $from, int $seed, string $to): int
	{
		$map = $this->getMap($from);
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
