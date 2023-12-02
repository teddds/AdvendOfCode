<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day2;

use AdventOfCode\Y2023\Day2\CubeSet;
use AdventOfCode\Y2023\Day2\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AdventOfCode\Y2023\Day2\Day
 *
 * @internal
 */
class Test extends TestCase
{
	private const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';
	private const SAMPLE_FILE_PART_2 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart2Sample.txt';

	/**
	 * @test
	 */
	public function sumPlayableGames(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$maxCubeSet = new CubeSet(green: 13, red: 12, blue: 14);
		$this->assertEquals(8, $day->getSumPlayableGames($maxCubeSet));

		$day = new Day(self::FILE);
		$result = $day->getSumPlayableGames($maxCubeSet);
	}

	/**
	 * @test
	 */
	public function sumMinimumCubeSetPower(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(2286, $day->getSumPowersOfMiniumCubeSets());

		$day = new Day(self::FILE);
		$result = $day->getSumPowersOfMiniumCubeSets();
	}
}
