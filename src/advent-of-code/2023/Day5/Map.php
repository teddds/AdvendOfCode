<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day5;

class Map
{
	/**
	 * @param string $from
	 * @param string $to
	 * @param MapCollection $mapCollection
	 * @param Range[] $ranges
	 */
	public function __construct(
		public readonly string $from,
		public readonly string $to,
		public readonly MapCollection $mapCollection,
		public array $ranges = [],
	) {}

	public function addRange(Range $range): void
	{
		$this->ranges[] = $range;
	}

	public function getNextDestinationNumber(int $seed): int
	{
		foreach ($this->ranges as $range) {
			$dest = $range->getMappedDestinationValue($seed);
			if ($dest !== null) {
				return $dest;
			}
		}

		return $seed;
	}
}
