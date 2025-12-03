<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day4;

use AdventOfCode\Y2023\Day4\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function sumOfAllScratchCards(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(13, $day->getSumPointOfAllCards());

		$day = new Day(self::FILE);
		$this->assertEquals(26443, $day->getSumPointOfAllCards());
	}

	#[Test]
	public function sumInstancesOfAllScratchCards(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(30, $day->getSumInstancesOfAllScratchCards());

		$day = new Day(self::FILE);
		$this->assertEquals(6284877, $day->getSumInstancesOfAllScratchCards());
	}
}
