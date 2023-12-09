<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day7;

final class CardDeck
{
	public bool $joker = false;
	public array $cardCodeArray;
	public array $cardCodeOriginalArray;
	private array $cardCodeByCount;
	private int $count;

	private CardPattern $pattern;

	public function __construct(
		public readonly string $cardCode,
		public readonly int $bid,
		public ?string $original = null
	) {
		if ($this->original) {
			$this->joker = true;
		} else {
			$this->original = $this->cardCode;
		}
		$this->cardCodeArray = str_split($this->cardCode);
		$this->cardCodeOriginalArray = str_split($this->original);

		foreach ($this->cardCodeArray as $char) {
			if (!isset($this->cardCodeByCount[$char])) {
				$this->cardCodeByCount[$char] = 1;
			} else {
				++$this->cardCodeByCount[$char];
			}
		}

		$this->count = count($this->cardCodeByCount);

		$this->pattern = $this->calcCardPattern();
	}

	public static function findHighestPatternFrom(self $original): self
	{
		$cards = [];
		foreach (HighCardOrder::MAPPING as $char => $order) {
			$cards[] = new self(
				str_replace('J', (string) $char, $original->cardCode),
				$original->bid,
				$original->cardCode
			);
		}

		usort($cards, [$original, 'compare']);

		return end($cards);
	}

	public static function compare(self $a, self $b): int
	{
		$pattern_a = $a->getCardPattern();
		$pattern_b = $b->getCardPattern();

		if ($pattern_a->value < $pattern_b->value) {
			return -1;
		}

		if ($pattern_a->value > $pattern_b->value) {
			return 1;
		}

		// Single Char Compare
		for ($i = 0; $i < 5; ++$i) {
			$a_char = HighCardOrder::fromMapping($a->cardCodeOriginalArray[$i], $a->joker);
			$b_char = HighCardOrder::fromMapping($b->cardCodeOriginalArray[$i], $b->joker);

			if ($a_char->value < $b_char->value) {
				return -1;
			}

			if ($a_char->value > $b_char->value) {
				return 1;
			}
		}

		return 0;
	}

	public function getCardPattern(): CardPattern
	{
		return $this->pattern;
	}

	private function calcCardPattern(): CardPattern
	{
		if ($this->count === 1) {
			return CardPattern::FIVE_OF_A_KIND;
		}

		if ($this->count === 2) {
			// Prüfen nach Vierling oder Full House
			foreach ($this->cardCodeByCount as $count) {
				if ($count === 4) {
					return CardPattern::FOUR_OF_A_KIND;
				}
			}

			return CardPattern::FULL_HOUSE;
		}

		if ($this->count === 3) {
			// Drilling // 2 Pairs
			$pairsCount = 0;
			foreach ($this->cardCodeByCount as $count) {
				if ($count === 3) {
					return CardPattern::THREE_OF_A_KIND;
				}

				if ($count === 2) {
					++$pairsCount;
				}
			}

			if ($pairsCount === 2) {
				return CardPattern::TWO_PAIR;
			}

			if ($pairsCount === 1) {
				return CardPattern::ONE_PAIR;
			}
		}

		if ($this->count === 4) {
			return CardPattern::ONE_PAIR;
		}

		return CardPattern::HIGH_CARD;
	}
}
