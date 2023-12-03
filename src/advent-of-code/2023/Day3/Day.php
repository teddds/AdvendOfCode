<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day3;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getSumAllPartNumbersOfEngine(): int
	{
		$sum = 0;

		$grid = $this->getGrid();
		foreach ($this->getGridDigitItems($grid) as $digitItem) {
			if ($digitItem->hasAdjecentSymbol()) {
				$sum += $digitItem->getCompleteNumber();
			}
		}

		return $sum;
	}

	public function getSumOfAllGearRatios(): int
	{
		$sum = 0;

		$grid = $this->getGrid();
		$numbers = $this->getGridDigitItems($grid);

		$gears = [];
		foreach ($grid->each() as $element) {
			if ($element->isGearSymbol()) {
				$gears[] = new GridGearItem($element);
			}
		}

		foreach ($gears as $gear) {
			$connectedNumbers = $gear->getAdjecentsDigits($numbers);
			if (count($connectedNumbers) > 1) {
				$sum += array_product(array_map(static fn (GridDigitItem $item) => $item->getCompleteNumber(), $connectedNumbers));
			}
		}

		return $sum;
	}

	private function getGrid(): Grid
	{
		$grid = new Grid();

		$y = 0;
		foreach (Utils::readFile($this->inputPath) as $line) {
			$x = 0;
			$chars = mb_str_split($line);
			foreach ($chars as $char) {
				$grid->addSymbol($x, $y, $char);
				++$x;
			}
			++$y;
		}

		return $grid;
	}

	/**
	 * @param Grid $grid
	 *
	 * @return GridDigitItem[]
	 */
	private function getGridDigitItems(Grid $grid): array
	{
		$numbers = [];
		foreach ($grid->eachRow() as $gridItems) {
			$prevWasDigit = false;
			$currentElement = null;
			foreach ($gridItems as $gridItem) {
				if ($gridItem->isDigit()) {
					if (!$prevWasDigit || !$currentElement) {
						$currentElement = new GridDigitItem();
						$numbers[] = $currentElement;
					}
					$currentElement->addElement($gridItem);
					$prevWasDigit = true;
				} else {
					$prevWasDigit = false;
				}
			}
		}

		return $numbers;
	}
}
