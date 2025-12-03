<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day8;

use AdventOfCode\Y2022\Day8\TreeMapOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(TreeMapOperator::class)]
class DayTest extends TestCase
{
	public const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	#[Test]
	public function visibleAmount(): void
	{
		$fs = new TreeMapOperator(self::FILE);
		$this->assertEquals(21, $fs->getAmountVisibleTrees());
	}

	#[Test]
	public function getScenicScore(): void
	{
		$fs = new TreeMapOperator(self::FILE);
		$this->assertEquals(8, $fs->getMaxScenicScore());
	}
}
