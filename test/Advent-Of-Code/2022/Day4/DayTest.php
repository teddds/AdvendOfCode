<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day4;

use AdventOfCode\Y2022\Day4\CampCleanerReader;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(CampCleanerReader::class)]
class DayTest extends TestCase
{
	public const string file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	#[Test]
	public function score(): void
	{
		$d = new CampCleanerReader(self::file);
		$this->assertEquals(2, $d->getCountFullyContaindAssigmentPairs());
	}

	#[Test]
	public function groupScore(): void
	{
		$d = new CampCleanerReader(self::file);
		$this->assertEquals(4, $d->getCountFullyContaindAssigmentPairs(true));
	}
}
