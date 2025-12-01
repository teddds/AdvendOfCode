<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2025\Day1;

use AdventOfCode\Y2025\Day1\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2025\Day1\Day
 *
 * @internal
 */
class Test extends TestCase
{
	private const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	/**
	 * @test
	 */
	public function getPasswordTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(3, $day->getPassword());
		$day = new Day(self::FILE);
		$this->assertEquals(1165, $day->getPassword());
	}

	/**
	 * @test
	 */
	public function getPasswordAnyClickTest(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(6, $day->getPassword(countEveryDialPointZero: true));

		$day = new Day(self::FILE);
		$this->assertEquals(6496, $day->getPassword(countEveryDialPointZero: true));
	}
}
