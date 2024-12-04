<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2024\Day3;

use AdventOfCode\Y2024\Day3\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2024\Day3\Day
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
	public function totalMultiplicationsSumTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(161, $day->getTotalMultiplicationsSum());

		$day = new Day(self::FILE);
		$this->assertEquals(169021493, $day->getTotalMultiplicationsSum());
	}

	/**
	 * @test
	 */
	public function totalMultiplicationsSumWithDontsAndDosTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_2);
		$this->assertEquals(48, $day->getTotalMultiplicationsSumWithDontsAndDos());

		$day = new Day(self::FILE);
		$this->assertEquals(111762583, $day->getTotalMultiplicationsSumWithDontsAndDos());
	}
}
