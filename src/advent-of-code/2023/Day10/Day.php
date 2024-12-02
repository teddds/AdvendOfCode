<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

use Utils;

final class Day
{
	private ?Grid $grid = null;

	public function __construct(private readonly string $inputPath) {}

	public function getFarthesPoint(): int
	{
		$this->readInput();

		return $this->grid->getMaxDistance();
	}

	public function getSumExtrapolateValuesBackwards(): int
	{
		$this->readInput();

		return array_sum(array_map(static fn (MathRow $row) => $row->getNextExtrapolateValueBackwards(), $this->mathRows));
	}

	private function readInput(): void
	{
		$this->grid = new Grid();
		foreach (Utils::readFile($this->inputPath) as $line) {
			$this->grid->addLine($line);
		}
	}
}
