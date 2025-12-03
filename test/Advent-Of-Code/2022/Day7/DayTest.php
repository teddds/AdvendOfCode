<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day7;

use AdventOfCode\Y2022\Day7\FileOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileOperator::class)]
class DayTest extends TestCase
{
	public const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	#[Test]
	public function getTotalSize(): void
	{
		$fs = new FileOperator(self::FILE);
		$this->assertEquals(95437, $fs->getTotalSizeOfAllDirectorysLessThan());
	}

	#[Test]
	public function getTotalSizeAfterDelete(): void
	{
		$fs = new FileOperator(self::FILE);
		$this->assertEquals(24933642, $fs->getTotalSizeOfDeleteDirectorysWhichProducedEnoughtFreeSpace());
	}
}
