<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

class Range
{
	public int $destinationRangeEnd;
	public int $sourceRangeEnd;
	public int $delta;

	public function __construct(
		public readonly int $destinationRangeStart,
		public readonly int $sourceRangeStart,
		public readonly int $rangeLength,
	) {
		$this->destinationRangeEnd = $destinationRangeStart + $rangeLength;
		$this->sourceRangeEnd = $this->sourceRangeStart + $this->rangeLength;
		$this->delta = $this->destinationRangeStart - $this->sourceRangeStart;
	}

	public function getMappedDestinationValue(int $sourceValue): ?int
	{
		if ($sourceValue >= $this->sourceRangeStart && $sourceValue <= $this->sourceRangeEnd) {
			return $sourceValue + $this->delta;
		}

		return null;
	}
}
