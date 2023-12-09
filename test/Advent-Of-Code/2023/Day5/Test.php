<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day5;

use AdventOfCode\Y2023\Day5\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day5\Day
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
	public function lowesLocationNumber(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(35, $day->getLowestLocationNumber());

		$day = new Day(self::FILE);
		$this->assertEquals(910845529, $day->getLowestLocationNumber());
	}

	/**
	 * @test
	 */
	public function lowesLocationNumberFromSeedRanges(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(46, $day->getLowesLocationNumberFromSeedRanges());

		$day = new Day(self::FILE);
		$this->assertEquals(77435348, $day->getLowesLocationNumberFromSeedRanges());
	}
}
