<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day7;

use Utils;

final class Day
{
	/**
	 * @var CardDeck[]
	 */
	private array $cards = [];

	public function __construct(private readonly string $inputPath) {}

	public function getSumBid(bool $joker = false): int
	{
		$this->readInput($joker);

		usort($this->cards, [CardDeck::class, 'compare']);
		$rank = 1;
		$sum = 0;
		foreach ($this->cards as $card) {
			$sum += $rank * $card->bid;
			++$rank;
		}

		return $sum;
	}

	private function readInput(bool $jokerRuleEnabled = false): void
	{
		foreach (Utils::readFile($this->inputPath) as $line) {
			[$code, $bid] = explode(' ', $line);
			$originalCode = null;
			if ($jokerRuleEnabled && str_contains($code, 'J')) {
				$originalCode = $code;
			}
			$card = new CardDeck($code, (int) $bid, $originalCode);
			if ($originalCode) {
				$card = CardDeck::findHighestPatternFrom($card);
			}
			$this->cards[] = $card;
		}
	}
}
