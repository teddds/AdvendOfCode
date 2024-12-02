<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day9;

use AdventOfCode\Y2022\Day9\BridgeGridOperator;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class Test extends TestCase
{
	public const FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	public const MULTPLE_FILE = __DIR__ . DIRECTORY_SEPARATOR . 'multiple_input.txt';

	/**
	 * @test
	 */
	public function oneKnotTest(): void
	{
		$fs = new BridgeGridOperator(self::FILE, true);
		$this->assertEquals(13, $fs->getUsedTilesByTail());

		$fs = new BridgeGridOperator();
		$this->assertEquals(6197, $fs->getUsedTilesByTail());

		$r = new ReflectionClass(BridgeGridOperator::class);
		$path = dirname($r->getFileName());

		$fs = new BridgeGridOperator($path . DIRECTORY_SEPARATOR . 'input_maik.txt');
		$this->assertEquals(6044, $fs->getUsedTilesByTail());
	}

	/**
	 * @test
	 */
	public function multipleKnotTest(): void
	{
		//		$fs = new BridgeGridOperator(self::FILE, true, 9);
		//		$this->assertEquals(1, $fs->getUsedTilesByTail());

		$fs = new BridgeGridOperator(self::MULTPLE_FILE, true, 9);
		$this->assertEquals(36, $fs->getUsedTilesByTail());
	}
}
