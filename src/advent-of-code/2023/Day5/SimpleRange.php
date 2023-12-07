<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day5;

class SimpleRange
{
	public function __construct(
		public readonly int $start,
		public readonly int $end,
	) {}
}
