<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day9;

final class MathRow
{
	/**
	 * @param int[] $data
	 */
	public function __construct(public readonly array $data) {}

	public function getNextExtrapolateValue(): int
	{
		$row = $this;
		$int = 0;
		do {
			$int += $row->data[array_key_last($row->data)];
			$row = $row->createSubtracRow();
		} while (!$row->isZeroRow());

		return $int;
	}

	public function getNextExtrapolateValueBackwards(): int
	{
		$row = $this;
		$rows = [$row];
		do {
			$row = $row->createSubtracRow();
			$rows[] = $row;
		} while (!$row->isZeroRow());

		$rows = array_reverse($rows);
		$last = 0;
		foreach ($rows as $row) {
			$last = $row->data[array_key_first($row->data)] - $last;
		}

		return $last;
	}

	public function isZeroRow(): bool
	{
		foreach ($this->data as $data) {
			if ($data !== 0) {
				return false;
			}
		}

		return true;
	}

	private function createSubtracRow(): MathRow
	{
		$new = [];
		for ($i = 0, $iMax = count($this->data); $i < $iMax - 1; ++$i) {
			$new[] = $this->data[$i + 1] - $this->data[$i];
		}

		return new MathRow($new);
	}

	private function getDiffRow(MathRow $a, MathRow $b) {}
}
