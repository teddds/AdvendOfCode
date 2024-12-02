<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day8;

use Utils;

class TreeMapOperator
{
	private const TOTAL = 70000000;

	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	/** @var Tree[] array */
	private array $trees = [];

	public function __construct(private ?string $path = null)
	{
		$this->path ??= self::INPUT;
		$this->readStructure();
	}

	public function getMaxScenicScore(): int
	{
		$max = 0;
		foreach ($this->trees as $tree) {
			$max = max($max, $tree->getScenicScore());
		}

		return $max;
	}

	public function getAmountVisibleTrees(): int
	{
		$total = 0;
		foreach ($this->trees as $tree) {
			if ($tree->isVisible()) {
				++$total;
			}
		}

		return $total;
	}

	private function readStructure(): void
	{
		/** @var Tree[][] $array */
		$array = [];
		$i = 0;
		foreach (Utils::readFile($this->path) as $row) {
			$row = trim($row);
			foreach (str_split($row) as $index => $height) {
				$t = new Tree();
				$t->size = (int) $height;
				$t->x = $index;
				$t->y = $i;
				$array[$i][$index] = $t;
			}

			++$i;
		}

		$trees = [];
		foreach ($array as $y => $row) {
			foreach ($row as $x => $tree) {
				$tree->top = $array[$y - 1][$x] ?? null;
				$tree->down = $array[$y + 1][$x] ?? null;
				$tree->left = $array[$y][$x - 1] ?? null;
				$tree->right = $array[$y][$x + 1] ?? null;
				$trees[] = $tree;
			}
		}

		$this->trees = $trees;
	}
}
