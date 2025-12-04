<?php
declare(strict_types=1);

namespace AdventOfCode\Y2025\Day3;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getSumJoltagePart1(): int
	{
		$sumInvalidIDs = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$calc = new JoltageCalculator($line);
			$sumInvalidIDs += $calc->getMaxVoltage(2);
		}

		return $sumInvalidIDs;
	}

	public function getSumInvalidIDsPart2(): int
	{
		$sumInvalidIDs = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$calc = new JoltageCalculator($line);
			$sumInvalidIDs += $calc->getMaxVoltage(12);
		}

		return $sumInvalidIDs;
	}
}
