<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2024\Day1;

use AdventOfCode\Y2024\Day1\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2024\Day1\Day
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
	public function totalDistanceTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(11, $day->getTotalDistance());

		$day = new Day(self::FILE);
		$this->assertEquals(1834060, $day->getTotalDistance());
	}

	/**
	 * @test
	 */
	public function similarityTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(31, $day->getSimilarity());

		$day = new Day(self::FILE);
		$this->assertEquals(21607792, $day->getSimilarity());
	}
}
