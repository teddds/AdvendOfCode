<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day2;

use AdventOfCode\Y2022\Day2\TournamentReader;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(TournamentReader::class)]
class DayTest extends TestCase
{
	public const string file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	#[Test]
	public function score(): void
	{
		$d = new TournamentReader(self::file);
		$this->assertEquals(15, $d->getScore());
	}

	#[Test]
	public function scoreDeserveOperation(): void
	{
		$d = new TournamentReader(self::file);
		$this->assertEquals(12, $d->getScore(true));
	}
}
