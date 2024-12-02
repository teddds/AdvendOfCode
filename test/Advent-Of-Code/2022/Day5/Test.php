<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day5;

use AdventOfCode\Y2022\Day5\CraneOperator;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
	public const file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	/**
	 * @test
	 */
	public function scoreTest(): void
	{
		$d = new CraneOperator(self::file);
		$this->assertEquals('CMZ', $d->getMessage());
	}

	/**
	 * @test
	 */
	public function groupScoreTest(): void
	{
		$d = new CraneOperator(self::file);
		$this->assertEquals('MCD', $d->getMessage(true));
	}
}
