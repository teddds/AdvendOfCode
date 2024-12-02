<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day2;

use AdventOfCode\Y2022\Day2\TournamentReader;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
	public const file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	/**
	 * @test
	 */
	public function scoreTest(): void
	{
		$d = new TournamentReader(self::file);
		$this->assertEquals(15, $d->getScore());
	}

	/**
	 * @test
	 */
	public function scoreDeserveOperationTest(): void
	{
		$d = new TournamentReader(self::file);
		$this->assertEquals(12, $d->getScore(true));
	}
}
