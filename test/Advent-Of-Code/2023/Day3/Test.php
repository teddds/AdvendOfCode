<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day3;

use AdventOfCode\Y2023\Day3\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day3\Day
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
	public function sumAllPartNumbersOfEngine(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(4361, $day->getSumAllPartNumbersOfEngine());

		$day = new Day(self::FILE);
		$this->assertEquals(540212, $day->getSumAllPartNumbersOfEngine());
	}

	/**
	 * @test
	 */
	public function sumAllGearRatios(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(467835, $day->getSumOfAllGearRatios());

		$day = new Day(self::FILE);
		$this->assertEquals(87605697, $day->getSumOfAllGearRatios());
	}
}
