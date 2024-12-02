<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

use Generator;

final class Coord
{
	public function __construct(
		public readonly ?Operation $operation,
		public readonly int $x,
		public readonly int $y,
		private Grid $grid
	) {}

	public function isPipeSymbol(): bool
	{
		return $this->operation instanceof Operation;
	}

	public function isConnectableTo(self $otherCoord): bool
	{
		foreach ($this->getOffsetCoord() as $c) {
			if ($c === $otherCoord) {
				return true;
			}
		}

		return false;
	}

	public function getNext(?self $previousCoord = null): ?Coord
	{
		if (!$this->isPipeSymbol()) {
			return null;
		}

		foreach ($this->getOffsetCoord() as $c) {
			if ($c === $previousCoord) {
				continue;
			}
			if ($c->isPipeSymbol() && $c->isConnectableTo($this)) {
				return $c;
			}
		}

		return null;
	}

	/**
	 * @return Generator<Coord>
	 */
	private function getOffsetCoord(): Generator
	{
		foreach ($this->operation->getOffsets() as $offset) {
			try {
				$c = $this->grid->getAt($this->x + $offset->x, $this->y + $offset->y);
				yield $c;
			} catch (OutOfGridException $e) {
				continue;
			}
		}
	}
}
