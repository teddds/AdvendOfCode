<?php
declare(strict_types=1);

class Day1
{
	private const INPUT = 'input.txt';

	private array $content;

	public function __construct()
	{
		$handle = fopen(self::INPUT, 'r');
		$result = [];
		if ($handle) {
			$pointer = 0;
			while (($line = fgets($handle)) !== false) {
				$line = trim($line);
				if (empty($line)) {
					++$pointer;
				} else {
					$result[$pointer][] = (int) $line;
				}
			}

			fclose($handle);
		}

		$sums = array_map(fn ($elf) => array_sum($elf), $result);
		rsort($sums);
		$this->content = $sums;
	}

	public function getSumOfElfWithMostCalories(): int
	{
		return $this->content[0];
	}

	public function getSumOfTopThreeElfWithMostCalories(): int
	{
		$spliced = array_splice($this->content, 0, 3);

		return array_sum($spliced);
	}
}

$day = new Day1();
echo 'total Calories of Elf with most Calories: ' . $day->getSumOfElfWithMostCalories() . "\n";
echo 'total Calories of Top 3 Elfs with most Calories: ' . $day->getSumOfTopThreeElfWithMostCalories() . "\n";
