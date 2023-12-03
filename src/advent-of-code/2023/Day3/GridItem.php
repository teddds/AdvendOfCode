<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day3;

use Generator;

class GridItem
{
	private ?bool $hasAdjecentSymbol = null;

	public function __construct(
		public readonly int $x,
		public readonly int $y,
		public readonly string $symbol,
		private Grid $grid
	) {}

	public function isDigit(): bool
	{
		return is_numeric($this->symbol);
	}

	public function isPeriod(): bool
	{
		return $this->symbol === '.';
	}

	public function isGearSymbol(): bool
	{
		return $this->symbol === '*';
	}

	/**
	 * @return Generator<GridItem>
	 */
	public function getAdjacents(): Generator
	{
		$checks = [
			[$this->x - 1, $this->y - 1],
			[$this->x - 1, $this->y],
			[$this->x - 1, $this->y + 1],

			[$this->x, $this->y - 1],
			[$this->x, $this->y + 1],

			[$this->x + 1, $this->y - 1],
			[$this->x + 1, $this->y],
			[$this->x + 1, $this->y + 1],
		];

		foreach ($checks as $check) {
			[$x, $y] = $check;
			$item = $this->grid->getItemAt($x, $y);
			if ($item) {
				yield $item;
			}
		}
	}

	public function hasAdjacentSymbol(?GridItem $ignore = null): bool
	{
		if ($this->hasAdjecentSymbol !== null) {
			return $this->hasAdjecentSymbol;
		}

		foreach ($this->getAdjacents() as $item) {
			if ($ignore && $item->x === $ignore->x && $item->y === $ignore->y) {
				continue;
			}
			if ($item->isDigit()) {
				return $this->hasAdjecentSymbol = $item->hasAdjacentSymbol($this);
			}
			if (!$item->isPeriod()) {
				return $this->hasAdjecentSymbol = true;
			}
		}

		return $this->hasAdjecentSymbol = false;
	}
}
