<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day4;

use AdventOfCode\Y2022\Day4\CampCleanerReader;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
	public const file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	/**
	 * @test
	 */
	public function scoreTest(): void
	{
		$d = new CampCleanerReader(self::file);
		$this->assertEquals(2, $d->getCountFullyContaindAssigmentPairs());
	}

	/**
	 * @test
	 */
	public function groupScoreTest(): void
	{
		$d = new CampCleanerReader(self::file);
		$this->assertEquals(4, $d->getCountFullyContaindAssigmentPairs(true));
	}
}
