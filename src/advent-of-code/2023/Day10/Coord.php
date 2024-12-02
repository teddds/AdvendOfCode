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

	public function getNextElementInNorth(): Coord
	{
		return $this->grid->getAt($this->x, $this->y - 1);
	}

	public function getNextElementInEast(): Coord
	{
		return $this->grid->getAt($this->x + 1, $this->y);
	}

	public function getNextElementInWest(): Coord
	{
		return $this->grid->getAt($this->x - 1, $this->y);
	}

	public function getNextElementInSouth(): Coord
	{
		return $this->grid->getAt($this->x, $this->y + 1);
	}

	public function getNextElementInDirection(Direction $direction): Coord
	{
		return match ($direction) {
			Direction::NORTH => $this->getNextElementInNorth(),
			Direction::EAST => $this->getNextElementInEast(),
			Direction::WEST => $this->getNextElementInWest(),
			Direction::SOUTH => $this->getNextElementInSouth(),
		};
	}

	public function isEnclosedBy(array $loopCoords): bool
	{
		// Check 4 all directions
		$isInLoop = [];

		$directions = [];
		foreach (Direction::cases() as $direction) {
			$directions[] = [
				'direction' => $direction,
				'element' => $this,
			];
		}

		while (true) {
			try {
				$allDone = 0;
				/** @var array{direction: Direction, element: Coord} $direction */
				foreach ($directions as &$direction) {
					if (isset($isInLoop[$direction['direction']->value])) {
						++$allDone;
						continue;
					}
					$e = $direction['element']->getNextElementInDirection($direction['direction']);

					if (isset($loopCoords[$e->y][$e->x])) {
						$isInLoop[$direction['direction']->value] = true;
					}

					$direction['element'] = $e;
				}
				unset($direction);

				if ($allDone === 4) {
					return true;
				}
			} catch (OutOfGridException $e) {
				return false;
			}
		}
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
