<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day9;

use Utils;

final class Day
{
	/** @var MathRow[] */
	private array $mathRows = [];

	public function __construct(private readonly string $inputPath) {}

	public function getSumExtrapolateValues(): int
	{
		$this->readInput();

		return array_sum(array_map(static fn (MathRow $row) => $row->getNextExtrapolateValue(), $this->mathRows));
	}

	public function getSumExtrapolateValuesBackwards(): int
	{
		$this->readInput();

		return array_sum(array_map(static fn (MathRow $row) => $row->getNextExtrapolateValueBackwards(), $this->mathRows));
	}

	private function readInput(): void
	{
		foreach (Utils::readFile($this->inputPath) as $line) {
			$row = array_map(static fn (string $number) => (int) $number, explode(' ', $line));
			$this->mathRows[] = new MathRow($row);
		}
	}
}
