<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

use Generator;

class CardCollection
{
	public function __construct(private array $cards = []) {}

	public function addCard(int $id, array $winningNumbers, array $chosenNumbers): Card
	{
		$card = new Card($id, $winningNumbers, $chosenNumbers, $this);
		$this->cards[$card->id] = $card;

		return $card;
	}

    public function count(): int {
        return count($this->cards);
    }

	public function getCard(int $id): ?Card
	{
		return $this->cards[$id] ?? null;
	}

	/**
	 * @return Generator<Card>
	 */
	public function each(): Generator
	{
		foreach ($this->cards as $card) {
			yield $card;
		}
	}

}
