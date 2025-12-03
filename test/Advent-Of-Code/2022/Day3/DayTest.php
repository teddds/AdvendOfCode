<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day3;

use AdventOfCode\Y2022\Day3\RucksackReader;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(RucksackReader::class)]
class DayTest extends TestCase
{
	public const string file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	#[Test]
	public function score(): void
	{
		$d = new RucksackReader(self::file);
		$this->assertEquals(157, $d->getScore());
	}

	#[Test]
	public function groupScore(): void
	{
		$d = new RucksackReader(self::file);
		$this->assertEquals(70, $d->getScore(true));
	}
}
