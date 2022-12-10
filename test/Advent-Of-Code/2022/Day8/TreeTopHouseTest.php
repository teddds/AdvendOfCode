<?php

namespace Test\AdventOfCode\Y2022\Day8;

use AdventOfCode\Y2022\Day7\FileOperator;
use AdventOfCode\Y2022\Day8\TreeMapOperator;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class TreeTopHouseTest extends TestCase
{
    public const FILE = __DIR__.DIRECTORY_SEPARATOR.'input.txt';

    /**
     * @test
     */
    public function visibleAmountTest(): void
    {
        $fs = new TreeMapOperator(self::FILE);
        $this->assertEquals(21, $fs->getAmountVisibleTrees());
    }

	/**
	 * @test
	 */
	public function getScenicScoreTest(): void
	{
		$fs = new TreeMapOperator(self::FILE);
		$this->assertEquals(8, $fs->getMaxScenicScore());
	}
}
