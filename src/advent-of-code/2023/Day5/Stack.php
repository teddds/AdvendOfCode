<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day5;

class Stack
{
	public function __construct(
		public readonly string $from,
		public readonly SimpleRange $range,
	) {}
}
