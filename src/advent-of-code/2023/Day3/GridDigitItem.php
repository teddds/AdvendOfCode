<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day3;

class GridDigitItem
{
	/** @var GridItem[] */
	private array $items = [];

	private ?GridItem $gridGearItem = null;
	private bool $gridGearItemHasCalculated = false;

	public function __construct() {}

	public function addElement(GridItem $gridItem): void
	{
		$this->items[] = $gridItem;
	}

	public function getCompleteNumber(): int
	{
		$str = '';
		foreach ($this->items as $item) {
			$str .= $item->symbol;
		}

		return (int) $str;
	}

	public function getGearAdjecent(): ?GridItem
	{
		if ($this->gridGearItemHasCalculated) {
			return $this->gridGearItem;
		}
		$this->gridGearItemHasCalculated = true;
		foreach ($this->items as $item) {
			foreach ($item->getAdjacents() as $adjcents) {
				if ($adjcents->isGearSymbol()) {
					return $this->gridGearItem = $adjcents;
				}
			}
		}

		return null;
	}

	public function hasAdjecentSymbol(): bool
	{
		foreach ($this->items as $item) {
			if ($item->hasAdjacentSymbol()) {
				return true;
			}
		}

		return false;
	}
}
