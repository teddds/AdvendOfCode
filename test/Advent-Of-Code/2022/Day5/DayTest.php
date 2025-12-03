<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day5;

use AdventOfCode\Y2022\Day5\CraneOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(CraneOperator::class)]
class DayTest extends TestCase
{
	public const string file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	#[Test]
	public function score(): void
	{
		$d = new CraneOperator(self::file);
		$this->assertEquals('CMZ', $d->getMessage());
	}

	#[Test]
	public function groupScore(): void
	{
		$d = new CraneOperator(self::file);
		$this->assertEquals('MCD', $d->getMessage(true));
	}
}
