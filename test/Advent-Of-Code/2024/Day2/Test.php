<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2024\Day2;

use AdventOfCode\Y2024\Day2\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2024\Day2\Day
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
	public function totalSaveReportsTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2, $day->getTotalSaveReports());

		$day = new Day(self::FILE);
		$this->assertEquals(591, $day->getTotalSaveReports());
	}

	/**
	 * @test
	 */
	public function totalSaveReportsWithDampenerTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(4, $day->getTotalSaveReportsWithDampener());

		$day = new Day(self::FILE);
		$this->assertEquals(621, $day->getTotalSaveReportsWithDampener());
	}
}
