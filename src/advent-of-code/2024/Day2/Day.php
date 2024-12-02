<?php
declare(strict_types=1);

namespace AdventOfCode\Y2024\Day2;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getTotalSaveReports(): int
	{
		$total = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			// get First and Last Digits of line
			$list = $this->getNumberslist($line);
			if ($this->isSafe($list)) {
				++$total;
			}
		}

		return $total;
	}

	public function getTotalSaveReportsWithDampener(): int
	{
		$total = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			// get First and Last Digits of line
			$list = $this->getNumberslist($line);
			if ($this->isSafe($list)) {
				++$total;
			} else {
				// Alternate the array
				foreach ($list as $key => $item) {
					$copy = $list;
					unset($copy[$key]);
					if ($this->isSafe($copy)) {
						++$total;
						continue 2;
					}
				}
			}
		}

		return $total;
	}

	private function getNumberslist(string $line): array
	{
		return array_map(fn ($item) => (int) $item, array_values(array_filter(explode(' ', $line))));
	}

	private function isSafe(array $array): bool
	{
		return $this->isIncreasing($array) || $this->isDecreasing($array);
	}

	private function isIncreasing(array $array): bool
	{
		$prev = null;
		foreach ($array as $item) {
			if ($prev !== null && ($item <= $prev || $item > $prev + 3)) {
				return false;
			}
			$prev = $item;
		}

		return true;
	}

	private function isDecreasing(array $array): bool
	{
		$prev = null;
		foreach ($array as $item) {
			if ($prev !== null && ($item >= $prev || $item < $prev - 3)) {
				return false;
			}
			$prev = $item;
		}

		return true;
	}
}
