<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day1;

use AdventOfCode\Y2023\Day1\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const string SAMPLE_FILE_PART_2 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart2Sample.txt';

	#[Test]
	public function sumCalibration(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(142, $day->getSumCalibrationValues());

		$day = new Day(self::FILE);
		$this->assertEquals(53386, $day->getSumCalibrationValues());
	}

	#[Test]
	public function sumCalibrationSpelling(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_2);
		$this->assertEquals(281, $day->getSumCalibrationSpellingValues());

		$day = new Day(self::FILE);
		$this->assertEquals(53312, $day->getSumCalibrationSpellingValues());
	}
}
