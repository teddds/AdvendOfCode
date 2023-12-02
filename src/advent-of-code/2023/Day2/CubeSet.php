<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day2;

class CubeSet
{
	public function __construct(
		public readonly int $green = 0,
		public readonly int $red = 0,
		public readonly int $blue = 0,
	) {}

	public function getPower(): int
	{
		return max($this->blue, 1) * max($this->red, 1) * max($this->green, 1);
	}
}
