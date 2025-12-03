<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2024\Day1;

use AdventOfCode\Y2024\Day1\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function totalDistanceTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(11, $day->getTotalDistance());

		$day = new Day(self::FILE);
		$this->assertEquals(1834060, $day->getTotalDistance());
	}

	#[Test]
	public function similarityTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(31, $day->getSimilarity());

		$day = new Day(self::FILE);
		$this->assertEquals(21607792, $day->getSimilarity());
	}
}
