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

	public function getCountEnclosedPointsInLoop(): int
	{
		$this->readInput();

		return $this->grid->getCountEnclosedPointsInLoop();
	}

	private function readInput(): void
	{
		$this->grid = new Grid();
		foreach (Utils::readFile($this->inputPath) as $line) {
			$this->grid->addLine($line);
		}
	}
}
