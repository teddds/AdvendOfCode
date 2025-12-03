<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day8;

use AdventOfCode\Y2023\Day8\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const string SAMPLE_FILE_PART_2 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart2Sample1.txt';
	private const string SAMPLE_2_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample2.txt';

	#[Test]
	public function stepCount(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2, $day->getStepCount());

		$day = new Day(self::SAMPLE_2_FILE_PART_1);
		$this->assertEquals(6, $day->getStepCount());

		$day = new Day(self::FILE);
		$this->assertEquals(19667, $day->getStepCount());
	}

	#[Test]
	public function stepCountLeastCommonMultiple(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_2);
		$this->assertEquals(6, $day->getStepCountLeastCommonMultiple());

		$day = new Day(self::FILE);
		$this->assertEquals(19185263738117, $day->getStepCountLeastCommonMultiple());
	}
}
