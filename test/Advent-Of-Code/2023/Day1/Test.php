<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day1;

use AdventOfCode\Y2023\Day1\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day1\Day
 *
 * @internal
 */
class Test extends TestCase
{
	private const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const SAMPLE_FILE_PART_2 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart2Sample.txt';

	/**
	 * @test
	 */
	public function sumCalibrationTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(142, $day->getSumCalibrationValues());

		$day = new Day(self::FILE);
		$result = $day->getSumCalibrationValues();
	}

	/**
	 * @test
	 */
	public function sumCalibrationSpellingTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_2);
		$this->assertEquals(281, $day->getSumCalibrationSpellingValues());

		$day = new Day(self::FILE);
		$result = $day->getSumCalibrationSpellingValues();
	}
}
