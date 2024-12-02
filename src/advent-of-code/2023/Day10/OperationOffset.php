<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

final class OperationOffset
{
	public function __construct(public readonly int $x = 0, public readonly int $y = 0) {}
}
