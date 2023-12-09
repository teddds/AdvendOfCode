<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day8;

use InvalidArgumentException;

final class Node
{
	public readonly bool $isEndNode;

	public function __construct(public readonly string $name, public readonly string $left, public readonly string $right)
	{
		$this->isEndNode = str_ends_with($this->name, 'Z');
	}

	public function getByInstruction(string $instruction): string
	{
		if ($instruction === Instruction::LEFT) {
			return $this->left;
		}

		if ($instruction === Instruction::RIGHT) {
			return $this->right;
		}

		throw new InvalidArgumentException('instruction could only by L or R, not "' . $instruction . '"');
	}
}
