<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2025\Day3;

use AdventOfCode\Y2025\Day3\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function getSumJoltagePart1(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(357, $day->getSumJoltagePart1());
		$day = new Day(self::FILE);
		$this->assertEquals(17435, $day->getSumJoltagePart1());
	}

	#[Test]
	public function getSumInvalidIDsPart2(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(3121910778619, $day->getSumInvalidIDsPart2());
		$day = new Day(self::FILE);
		$this->assertEquals(54446379122, $day->getSumInvalidIDsPart2());
	}
}
