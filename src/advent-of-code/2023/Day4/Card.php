<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

class Card
{
	private ?array $intersect = null;
	private ?int $intersectCount = null;

	/**
	 * @param int $id
	 * @param int[] $winningNumbers
	 * @param int[] $chosenNumbers
	 * @param CardCollection $cardCollection
	 */
	public function __construct(
		public readonly int $id,
		public readonly array $winningNumbers,
		public readonly array $chosenNumbers,
		private readonly CardCollection $cardCollection,
	) {}

	public function getPoints(): int
	{
		$count = $this->getCountIntersect();

		if ($count === 0) {
			return 0;
		}

		if ($count === 1) {
			return 1;
		}

		$result = 1;
		for ($i = 1; $i < $count; ++$i) {
			$result *= 2;
		}

		return $result;
	}

	public function getSumInstances(): int
	{
		$count = $this->getCountIntersect();

		$total = 0;

		for ($i = 1; $i <= $count; ++$i) {
			$total += 1 + (int) $this->cardCollection->getCard($this->id + $i)?->getSumInstances();
		}

		return $total;
	}

	private function getIntersect(): array
	{
		if ($this->intersect === null) {
			$this->intersect = array_intersect($this->winningNumbers, $this->chosenNumbers);
		}

		return $this->intersect;
	}

	private function getCountIntersect(): int
	{
		if ($this->intersectCount === null) {
			$this->intersectCount = count($this->getIntersect());
		}

		return $this->intersectCount;
	}
}
