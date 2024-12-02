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
	private const PART_1_SAMPLE_FILE_1 = __DIR__ . DIRECTORY_SEPARATOR . 'Part1SampleFile1.txt';
	private const PART_1_SAMPLE_FILE_2 = __DIR__ . DIRECTORY_SEPARATOR . 'Part1SampleFile2.txt';
	private const PART_1_SAMPLE_FILE_3 = __DIR__ . DIRECTORY_SEPARATOR . 'Part1SampleFile3.txt';

	private const PART_2_SAMPLE_FILE_1 = __DIR__ . DIRECTORY_SEPARATOR . 'Part2SampleFile1.txt';
	private const PART_2_SAMPLE_FILE_2 = __DIR__ . DIRECTORY_SEPARATOR . 'Part2SampleFile2.txt';
	private const PART_2_SAMPLE_FILE_3 = __DIR__ . DIRECTORY_SEPARATOR . 'Part2SampleFile3.txt';
	private const PART_2_SAMPLE_FILE_4 = __DIR__ . DIRECTORY_SEPARATOR . 'Part2SampleFile4.txt';

	/**
	 * @test
	 */
	public function farthesPoint(): void
	{
		$day = new Day(self::PART_1_SAMPLE_FILE_1);
		$this->assertEquals(8, $day->getFarthesPoint());

		$day = new Day(self::PART_1_SAMPLE_FILE_2);
		$this->assertEquals(4, $day->getFarthesPoint());

		$day = new Day(self::PART_1_SAMPLE_FILE_3);
		$this->assertEquals(4, $day->getFarthesPoint());

		$day = new Day(self::FILE);
		$this->assertEquals(6860, $day->getFarthesPoint());
	}

    // TODO
//	/**
//	 * @test
//	 */
//	public function farthesPointWithinLoop(): void
//	{
////		$day = new Day(self::PART_2_SAMPLE_FILE_1);
////		$this->assertEquals(4, $day->getCountEnclosedPointsInLoop());
////
////        $day = new Day(self::PART_2_SAMPLE_FILE_2);
////        $this->assertEquals(4, $day->getCountEnclosedPointsInLoop());
//
//		$day = new Day(self::PART_2_SAMPLE_FILE_3);
//		$this->assertEquals(8, $day->getCountEnclosedPointsInLoop());
//
//		$day = new Day(self::PART_2_SAMPLE_FILE_4);
//		$this->assertEquals(10, $day->getCountEnclosedPointsInLoop());
//
//		$day = new Day(self::FILE);
//		$this->assertEquals(6860, $day->getCountEnclosedPointsInLoop());
//	}
}
