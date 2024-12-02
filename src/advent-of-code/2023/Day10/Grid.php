<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

use Generator;
use LogicException;

final class Grid
{
	/**
	 * @var array<int, array<int, Coord>>
	 */
	private array $data = [];

	private int $countX = 0;
	private int $countY = 0;

	public function addLine(string $line): void
	{
		$count = count($this->data);
		$lineArray = [];
		$strArray = str_split($line);
		$this->countX = count($strArray);
		foreach ($strArray as $x => $operation) {
			$lineArray[] = new Coord(Operation::tryFrom($operation), $x, $count, $this);
		}
		$this->data[] = $lineArray;
		++$this->countY;
	}

	public function getAt(int $x, int $y): Coord
	{
		return $this->data[$y][$x] ?? throw new OutOfGridException();
	}

	public function getCountEnclosedPointsInLoop(): int
	{
		$loopCoords = $this->getLoopCoords();
		$count = 0;
		foreach ($this->each() as $coord) {
			if (isset($loopCoords[$coord->y][$coord->x])) {
				continue;
			}

			$usedDirections = [];

			while (true) {
				if (!empty($usedDirections)) {
					$direction = current(array_udiff(
						Direction::cases(),
						$usedDirections,
						static fn (Direction $a, Direction $b) => $a->value <=> $b->value
					));
					if (!$direction instanceof Direction) {
						throw new LogicException('Intersects in no Direction countable');
					}
				} else {
					$direction = $this->getSearchDirectionFromCoord($coord);
				}

				$intersects = 0;
				$nextCoord = $coord;
				$elements = 0;
				while (true) {
					try {
						$nextCoord = $nextCoord->getNextElementInDirection($direction);
						if (isset($loopCoords[$nextCoord->y][$nextCoord->x])) {
							++$intersects;
						}
						++$elements;
					} catch (OutOfGridException) {
						break;
					}
				}

				if ($elements === $intersects && $elements !== 0) {
					// Anderer Winkel muss zu Betrachtung herangezogen werden
					$usedDirections[] = $direction;
					continue;
				}

				if ($intersects % 2 !== 0) {
					++$count;
				}

				break;
			}
		}

		return $count;
	}

	/**
	 * @return Generator<Coord>
	 */
	public function each(): Generator
	{
		return $this->walk($this->data);
	}

	public function getMaxDistance(): int
	{
		$coords = $this->getLoopCoords();
		$count = 0;
		array_walk_recursive($coords, static function () use (&$count) { ++$count; });

		return (int) ($count / 2);
	}

	private function getSearchDirectionFromCoord(Coord $coord): Direction
	{
		$halfX = $this->countX / 2;
		$halfY = $this->countY / 2;

		// Which direction?
		if ($coord->x <= $coord->y) {
			if ($coord->x < $halfX) {
				return Direction::WEST;
			}

			return Direction::EAST;
		}

		if ($coord->y < $halfY) {
			return Direction::NORTH;
		}

		return Direction::SOUTH;
	}

	private function walk(array $gridData): Generator
	{
		foreach ($gridData as $data) {
			foreach ($data as $coord) {
				yield $coord;
			}
		}
	}

	/**
	 * @return Coord[]
	 */
	private function getLoopCoords(): array
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

		return $coords;
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
