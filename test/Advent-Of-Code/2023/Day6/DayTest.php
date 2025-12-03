<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day6;

use AdventOfCode\Y2023\Day6\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function multiplyOfBeatenRecords(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(288, $day->getMultiplyOfBeatenRecords());

		$day = new Day(self::FILE);
		$this->assertEquals(633080, $day->getMultiplyOfBeatenRecords());
	}

	#[Test]
	public function howManyBeatenRecords(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(71503, $day->getSumBeatenRecords());

		$day = new Day(self::FILE);
		$this->assertEquals(20048741, $day->getSumBeatenRecords());
	}
}
