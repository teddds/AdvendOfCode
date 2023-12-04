<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day4;

use LogicException;
use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getSumPointOfAllCards(): int
	{
		$sum = 0;
		foreach ($this->getCards()->each() as $card) {
			$sum += $card->getPoints();
		}

		return $sum;
	}

	public function getSumInstancesOfAllScratchCards(): int
	{
		$cards = $this->getCards();
		$total = $cards->count();
		foreach ($cards->each() as $card) {
			$total += $card->getSumInstances();
		}

		return $total;
	}

	/**
	 * @return CardCollection
	 */
	private function getCards(): CardCollection
	{
		$cards = new CardCollection();

		foreach (Utils::readFile($this->inputPath) as $line) {
			$this->addCardFromLine($line, $cards);
		}

		return $cards;
	}

	private function addCardFromLine(string $line, CardCollection $cardCollection): void
	{
		if (!preg_match('/Card\s+(\d+):(.*)\|(.*)/', $line, $match)) {
			throw new LogicException('Wrong Input Format : ' . $line);
		}

		$card_id = (int) $match[1];
		$winningNumbers = array_map(static fn (string $number) => (int) $number, array_filter(explode(' ', $match[2])));
		$chosenNumbers = array_map(static fn (string $number) => (int) $number, array_filter(explode(' ', $match[3])));

		sort($winningNumbers);
		sort($chosenNumbers);

		$cardCollection->addCard($card_id, $winningNumbers, $chosenNumbers);
	}
}
