<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day3;

class GridGearItem
{
	public function __construct(private GridItem $item) {}

	/**
	 * @param GridDigitItem[] $digitItem
	 *
	 * @return GridDigitItem[]
	 */
	public function getAdjecentsDigits(array $digitItem): array
	{
		$numbers = [];
		foreach ($digitItem as $item) {
			if ($item->getGearAdjecent() === $this->item) {
				$numbers[] = $item;
			}
		}

		return $numbers;
	}
}
