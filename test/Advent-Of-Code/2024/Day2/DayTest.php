<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2024\Day2;

use AdventOfCode\Y2024\Day2\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function totalSaveReportsTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2, $day->getTotalSaveReports());

		$day = new Day(self::FILE);
		$this->assertEquals(591, $day->getTotalSaveReports());
	}

	#[Test]
	public function totalSaveReportsWithDampenerTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(4, $day->getTotalSaveReportsWithDampener());

		$day = new Day(self::FILE);
		$this->assertEquals(621, $day->getTotalSaveReportsWithDampener());
	}
}
