<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day3;

use AdventOfCode\Y2023\Day3\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function sumAllPartNumbersOfEngine(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(4361, $day->getSumAllPartNumbersOfEngine());

		$day = new Day(self::FILE);
		$this->assertEquals(540212, $day->getSumAllPartNumbersOfEngine());
	}

	#[Test]
	public function sumAllGearRatios(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(467835, $day->getSumOfAllGearRatios());

		$day = new Day(self::FILE);
		$this->assertEquals(87605697, $day->getSumOfAllGearRatios());
	}
}
