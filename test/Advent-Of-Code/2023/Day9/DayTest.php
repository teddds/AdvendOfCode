<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day9;

use AdventOfCode\Y2023\Day9\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function stepCount(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(114, $day->getSumExtrapolateValues());

		$day = new Day(self::FILE);
		$this->assertEquals(1884768153, $day->getSumExtrapolateValues());
	}

	#[Test]
	public function stepCountLeastCommonMultiple(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2, $day->getSumExtrapolateValuesBackwards());

		$day = new Day(self::FILE);
		$this->assertEquals(1031, $day->getSumExtrapolateValuesBackwards());
	}
}
