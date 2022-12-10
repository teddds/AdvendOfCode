<?php

namespace Test\AdventOfCode\Y2022\Day7;

use AdventOfCode\Y2022\Day7\FileOperator;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class Test extends TestCase
{
    public const FILE = __DIR__.DIRECTORY_SEPARATOR.'input.txt';

    /**
     * @test
     */
    public function sizeTest(): void
    {
        $fs = new FileOperator(self::FILE);
        $this->assertEquals(95437, $fs->getTotalSizeOfAllDirectorysLessThan());
    }

	/**
	 * @test
	 */
	public function deleteTest(): void
	{
		$fs = new FileOperator(self::FILE);
		$this->assertEquals(24933642, $fs->getTotalSizeOfDeleteDirectorysWhichProducedEnoughtFreeSpace());
	}
}
