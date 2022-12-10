<?php

namespace Test\AdventOfCode\Y2022\Day9;

use AdventOfCode\Y2022\Day7\FileOperator;
use AdventOfCode\Y2022\Day8\TreeMapOperator;
use AdventOfCode\Y2022\Day9\BridgeGridOperator;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class BridgeGridOperatorTest extends TestCase
{
    public const FILE = __DIR__.DIRECTORY_SEPARATOR.'input.txt';

    /**
     * @test
     */
    public function tileCountTest(): void
    {
        $fs = new BridgeGridOperator(self::FILE, false);
        $this->assertEquals(13, $fs->getUsedTilesByTail());
    }

//	/**
//	 * @test
//	 */
//	public function getScenicScoreTest(): void
//	{
//		$fs = new TreeMapOperator(self::FILE);
//		$this->assertEquals(8, $fs->getMaxScenicScore());
//	}
}
