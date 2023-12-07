<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day6;

use AdventOfCode\Y2023\Day6\Day;
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
	public function multiplyOfBeatenRecords(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(288, $day->getMultiplyOfBeatenRecords());

		$day = new Day(self::FILE);
		$this->assertEquals(633080, $day->getMultiplyOfBeatenRecords());
	}

	/**
	 * @test
	 */
	public function howManyBeatenRecords(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(71503, $day->getSumBeatenRecords());

		$day = new Day(self::FILE);
		$this->assertEquals(20048741, $day->getSumBeatenRecords());
	}
}
