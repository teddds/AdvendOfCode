<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day8;

use AdventOfCode\Y2023\Day8\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day8\Day
 *
 * @internal
 */
class Test extends TestCase
{
	private const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const SAMPLE_FILE_PART_2 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart2Sample1.txt';
	private const SAMPLE_2_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample2.txt';

	/**
	 * @test
	 */
	public function stepCount(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2, $day->getStepCount());

		$day = new Day(self::SAMPLE_2_FILE_PART_1);
		$this->assertEquals(6, $day->getStepCount());

		$day = new Day(self::FILE);
		$this->assertEquals(19667, $day->getStepCount());
	}

	/**
	 * @test
	 */
	public function stepCountLeastCommonMultiple(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_2);
		$this->assertEquals(6, $day->getStepCountLeastCommonMultiple());

		$day = new Day(self::FILE);
		$this->assertEquals(19185263738117, $day->getStepCountLeastCommonMultiple());
	}
}
