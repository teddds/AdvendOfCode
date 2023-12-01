<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day1;

use Utils;

class Day
{
	public function __construct(private string $inputPath) {}

	public function getSumCalibrationValues(): int
	{
		$sum = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			// get First and Last Digits of line
			$sum += $this->getNumberFromLine($line);
		}

		return $sum;
	}

	public function getSumCalibrationSpellingValues(): int
	{
		$sum = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$line = $this->convertSpelledDigitsToRealDigits($line);

			// get First and Last Digits of line
			$sum += $this->getNumberFromLine($line);
		}

		return $sum;
	}

	private function convertSpelledDigitsToRealDigits(string $line): string
	{
		// in Wortgruppen aufbrechen
		$mapping = [
			'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5,
			'six' => 6, 'seven' => 7, 'eight' => 8, 'nine' => 9,
		];

		$group = implode('|', array_keys($mapping));

		$patterns = [
			'/^[a-z]*?(' . $group . ')/', // First Occurence
			'/.*(' . $group . ')/', // Last Occurence
		];

		foreach ($patterns as $pattern) {
			$line = preg_replace_callback(
				$pattern,
				static function ($match) use ($mapping) {
					return str_replace($match[1], (string) $mapping[$match[1]], $match[0]);
				},
				$line,
				1
			);
		}

		return $line;
	}

	private function getNumberFromLine(string $line): int
	{
		if (!preg_match_all('/\d/', $line, $matches)) {
			return 0;
		}

		$first = reset($matches[0]);
		$last = end($matches[0]);

		return (int) ($first . $last);
	}
}
