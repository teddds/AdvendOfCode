<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day9;

use AdventOfCode\Y2023\Day9\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day9\Day
 *
 * @internal
 */
class Test extends TestCase
{
	private const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	/**
	 * @test
	 */
	public function stepCount(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(114, $day->getSumExtrapolateValues());


		$day = new Day(self::FILE);
		$this->assertEquals(1884768153, $day->getSumExtrapolateValues());
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
