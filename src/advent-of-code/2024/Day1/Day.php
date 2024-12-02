<?php
declare(strict_types=1);

namespace AdventOfCode\Y2024\Day1;

use Utils;

final class Day
{
	/** @var int[] */
	private array $listA = [];
	/** @var int[] */
	private array $listB = [];

	public function __construct(private readonly string $inputPath) {}

	public function getTotalDistance(): int
	{
		foreach (Utils::readFile($this->inputPath) as $line) {
			// get First and Last Digits of line
			$this->addNumbersToList($line);
		}
		sort($this->listA);
		sort($this->listB);

		$distance = 0;
		foreach ($this->listA as $key => $number) {
			$distance += abs($number - $this->listB[$key]);
		}

		return $distance;
	}

	public function getSimilarity(): int
	{
		foreach (Utils::readFile($this->inputPath) as $line) {
			// get First and Last Digits of line
			$this->addNumbersToList($line);
		}

		$tmp = [];
		foreach ($this->listB as $number) {
			if (isset($tmp[$number])) {
				++$tmp[$number];
			} else {
				$tmp[$number] = 1;
			}
		}
		$similarity = 0;
		foreach ($this->listA as $key => $number) {
			$similarity += $number * ($tmp[$number] ?? 0);
		}

		return $similarity;
	}

	private function addNumbersToList(string $line): void
	{
		[$a, $b] = array_values(array_filter(explode(' ', $line)));
		$this->listA[] = (int) $a;
		$this->listB[] = (int) $b;
	}
}
