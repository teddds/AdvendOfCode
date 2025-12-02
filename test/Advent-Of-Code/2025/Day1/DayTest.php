<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2025\Day1;

use AdventOfCode\Y2025\Day1\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function getPassword(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(3, $day->getPassword());
		$day = new Day(self::FILE);
		$this->assertEquals(1165, $day->getPassword());
	}

	#[Test]
	public function getPasswordAnyClickTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(6, $day->getPassword(countEveryDialPointZero: true));

		$day = new Day(self::FILE);
		$this->assertEquals(6496, $day->getPassword(countEveryDialPointZero: true));
	}
}
