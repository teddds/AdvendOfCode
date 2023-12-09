<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day4;

use AdventOfCode\Y2023\Day4\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day4\Day
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
	public function sumOfAllScratchCards(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(13, $day->getSumPointOfAllCards());

		$day = new Day(self::FILE);
		$this->assertEquals(26443, $day->getSumPointOfAllCards());
	}

	/**
	 * @test
	 */
	public function sumInstancesOfAllScratchCards(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(30, $day->getSumInstancesOfAllScratchCards());

		$day = new Day(self::FILE);
		$this->assertEquals(6284877, $day->getSumInstancesOfAllScratchCards());
	}
}
