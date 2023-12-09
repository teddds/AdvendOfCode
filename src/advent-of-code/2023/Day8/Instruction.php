<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day8;

use Generator;

final class Instruction
{
	public const LEFT = 'L';
	public const RIGHT = 'R';

	public function __construct(private readonly string $line) {}

	/**
	 * @return Generator<self::LEFT|self::RIGHT>
	 */
	public function getNextInstruction(): Generator
	{
		$tmp = str_split($this->line);
		while (true) {
			foreach ($tmp as $char) {
				yield $char;
			}
		}
	}
}
