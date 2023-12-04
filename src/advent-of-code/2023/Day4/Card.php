<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

class Card
{
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
		$intersect = $this->getIntersect();
		$ln = count($intersect);

		if ($ln === 0) {
			return 0;
		}

		if ($ln === 1) {
			return 1;
		}

		$result = 1;
		for ($i = 1; $i < $ln; ++$i) {
			$result *= 2;
		}

		return $result;
	}

	public function getSumInstances(): int
	{
		$intersect = $this->getIntersect();
		$ln = count($intersect);

		$total = 0;
		if ($ln) {
			// Nachfolger bekommen Copies
			for ($i = 1; $i <= $ln; ++$i) {
				$total += 1 + (int) $this->cardCollection->getCard($this->id + $i)?->getSumInstances();
			}
		}

		return $total;
	}

	private function getIntersect(): array
	{
		return array_intersect($this->winningNumbers, $this->chosenNumbers);
	}
}
