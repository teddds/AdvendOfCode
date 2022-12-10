<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day9;
class Base
{
	public function __construct(protected BridgeGridOperator $operator)
	{
	}

	public int $x = 0;
	public int $y = 0;

	const LEFT = 'Left';
	const UP = 'Up';
	const RIGHT = 'Right';
	const DOWN = 'Down';

	public function moveOneUp(): void {
		$this->y -= 1;
	}

	public function moveOneDown(): void {
		$this->y += 1;
	}

	public function moveOneLeft(): void {
		$this->x -= 1;
	}
	public function moveOneRight(): void {
		$this->x += 1;
	}

}