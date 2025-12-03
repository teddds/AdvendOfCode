<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2024\Day3;

use AdventOfCode\Y2024\Day3\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const string SAMPLE_FILE_PART_2 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart2Sample.txt';

	#[Test]
	public function totalMultiplicationsSumTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(161, $day->getTotalMultiplicationsSum());

		$day = new Day(self::FILE);
		$this->assertEquals(169021493, $day->getTotalMultiplicationsSum());
	}

	#[Test]
	public function totalMultiplicationsSumWithDontsAndDosTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_2);
		$this->assertEquals(48, $day->getTotalMultiplicationsSumWithDontsAndDos());

		$day = new Day(self::FILE);
		$this->assertEquals(111762583, $day->getTotalMultiplicationsSumWithDontsAndDos());
	}
}
