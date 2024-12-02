<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

use LogicException;

final class Grid
{
	/**
	 * @var array<int, array<int, Coord>>
	 */
	private array $data = [];

	public function addLine(string $line): void
	{
		$count = count($this->data);
		$i = -1;
		$lineArray = [];
		foreach (str_split($line) as $x => $operation) {
			$lineArray[] = new Coord(Operation::tryFrom($operation), $x, $count, $this);
		}
		$this->data[] = $lineArray;
	}

	public function getAt(int $x, int $y): Coord
	{
		return $this->data[$y][$x] ?? throw new OutOfGridException();
	}

	public function getMaxDistance(): int
	{
		$coords = [];
		$coord = $this->findStartPoint();
		$previous = null;
		while (true) {
			$currentCoord = $coord->getNext($previous);
			if ($currentCoord === null) {
				throw new NoLoopException();
			}
			/** @var Coord $currentCoord */
			if (isset($coords[$currentCoord->y][$currentCoord->x])) {
				break;
			}
			$coords[$currentCoord->y][$currentCoord->x] = $currentCoord;
			$previous = $coord;
			$coord = $currentCoord;
		}
		$count = 0;
		array_walk_recursive($coords, static function () use (&$count) { ++$count; });

		return (int) ($count / 2);
	}

	private function findStartPoint(): Coord
	{
		foreach ($this->data as $y => $row) {
			foreach ($row as $x => $coord) {
				if ($coord->operation === Operation::START) {
					return $coord;
				}
			}
		}

		throw new LogicException('No Startingpoint found');
	}
}
