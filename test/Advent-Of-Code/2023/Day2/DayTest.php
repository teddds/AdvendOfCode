<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day2;

use AdventOfCode\Y2023\Day2\CubeSet;
use AdventOfCode\Y2023\Day2\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function sumPlayableGames(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$maxCubeSet = new CubeSet(green: 13, red: 12, blue: 14);
		$this->assertEquals(8, $day->getSumPlayableGames($maxCubeSet));

		$day = new Day(self::FILE);
		$this->assertEquals(2810, $day->getSumPlayableGames($maxCubeSet));
	}

	#[Test]
	public function sumMinimumCubeSetPower(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2286, $day->getSumPowersOfMiniumCubeSets());

		$day = new Day(self::FILE);
		$this->assertEquals(69110, $day->getSumPowersOfMiniumCubeSets());
	}
}
