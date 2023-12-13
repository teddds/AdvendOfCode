<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day10;

use AdventOfCode\Y2023\Day10\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day10\Day
 *
 * @internal
 */
class Test extends TestCase
{
	private const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const SAMPLE_FILE_2_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample2.txt';
	private const SAMPLE_FILE_3_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample3.txt';

	/**
	 * @test
	 */
	public function farthesPoint(): void
	{
		$day = new Day(self::SAMPLE_FILE_2_PART_1);
		$this->assertEquals(4, $day->getFarthesPoint());

		$day = new Day(self::SAMPLE_FILE_3_PART_1);
		$this->assertEquals(4, $day->getFarthesPoint());

		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(8, $day->getFarthesPoint());

		$day = new Day(self::FILE);
		$this->assertEquals(6860, $day->getFarthesPoint());
	}

	/**
	 * @test
	 */
	public function stepCountLeastCommonMultiple(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2, $day->getSumExtrapolateValuesBackwards());

		$day = new Day(self::FILE);
		$this->assertEquals(1031, $day->getSumExtrapolateValuesBackwards());
	}
}
