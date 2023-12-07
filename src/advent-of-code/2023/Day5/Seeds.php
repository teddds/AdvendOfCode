<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

use Generator;

class Seeds
{
	/** @var callable|int[] */
	public $seeds;

	public function __construct(
		array|callable $seeds,
	) {
		$this->seeds = $seeds;
	}

	/**
	 * @return Generator<int>
	 */
	public function getNextSeed(): Generator
	{
		if (is_callable($this->seeds)) {
			foreach (($this->seeds)() as $seed) {
				yield $seed;
			}
		} else {
			foreach ($this->seeds as $element) {
				yield $element;
			}
		}
	}
}
