<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day3;

use AdventOfCode\Y2022\Day3\RucksackReader;
use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
	public const file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	/**
	 * @test
	 */
	public function scoreTest(): void
	{
		$d = new RucksackReader(self::file);
		$this->assertEquals(157, $d->getScore());
	}

	/**
	 * @test
	 */
	public function groupScoreTest(): void
	{
		$d = new RucksackReader(self::file);
		$this->assertEquals(70, $d->getScore(true));
	}
}
