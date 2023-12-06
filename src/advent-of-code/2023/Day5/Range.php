<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

class Range
{
	public function __construct(
		public readonly int $destinationRangeStart,
		public readonly int $sourceRangeStart,
		public readonly int $rangeLength,
		private readonly Map $map
	) {}

	public function getMappedDestinationValue(int $sourceValue): ?int
	{
		if ($sourceValue >= $this->sourceRangeStart && $sourceValue <= $this->sourceRangeStart + $this->rangeLength) {
			return $this->destinationRangeStart + $sourceValue - $this->sourceRangeStart;
		}

		return null;
	}
}
