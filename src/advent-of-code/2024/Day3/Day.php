<?php
declare(strict_types=1);

namespace AdventOfCode\Y2024\Day3;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getTotalMultiplicationsSum(): int
	{
		$total = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			if (preg_match_all('/mul\((\d{1,3}),(\d{1,3})\)/i', $line, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					$total += $match[1] * $match[2];
				}
			}
		}

		return $total;
	}

	public function getTotalMultiplicationsSumWithDontsAndDos(): int
	{
		$total = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$line = preg_replace('/don\'t\(\).*?do\(\)/i', '', $line);
			if (($pos = strpos($line, 'don\'t()')) !== false) {
				$line = substr($line, 0, $pos);
			}

			if (preg_match_all('/mul\((\d{1,3}),(\d{1,3})\)/i', $line, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					$total += $match[1] * $match[2];
				}
			}
		}

		return $total;
	}
}
