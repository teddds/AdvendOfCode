<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day3;

use Generator;

class Grid
{
	/**
	 * @var array<int, array<int, GridItem>>
	 */
	private array $grid = [];

	public function __construct(
	) {}

	public function addSymbol(int $x, int $y, string $symbol): void
	{
		$this->grid[$y][$x] = new GridItem($x, $y, $symbol, $this);
	}

	public function getItemAt($x, $y): ?GridItem
	{
		return $this->grid[$y][$x] ?? null;
	}

	/**
	 * @return Generator<GridItem>
	 */
	public function each(): Generator
	{
		foreach ($this->grid as $rows) {
			foreach ($rows as $char) {
				yield $char;
			}
		}
	}

	/**
	 * @return Generator<GridItem[]>
	 */
	public function eachRow(): Generator
	{
		foreach ($this->grid as $rows) {
			yield $rows;
		}
	}
}
