<?php
declare(strict_types=1);

namespace AdventOfCode\Y2025\Day1;

class SafeRotator
{
	private const int MAX = 100;
	private const int MIN = 0;
	private int $current = 50;
	private int $zeroCount = 0;

	public function __construct(private readonly bool $countEveryDialPointZero = false) {}

	public function runCommand(int $value, string $rotation): void
	{
		if ($rotation === 'R') {
			$this->rotateRight($value);
		} else {
			$this->rotateLeft($value);
		}

		if ($this->current === 0) {
			++$this->zeroCount;
		}
	}

	public function getPassword(): int
	{
		return $this->zeroCount;
	}

	private function rotateRight(int $value): void
	{
		if (($this->current + $value) > self::MAX) {
			$rest = $value - (self::MAX - $this->current);
			$this->current = self::MIN;
			if ($this->countEveryDialPointZero) {
				++$this->zeroCount;
			}

			$this->rotateRight($rest);
		} elseif (($this->current + $value) === self::MAX) {
			$this->current = 0;
		} else {
			$this->current += $value;
		}
	}

	private function rotateLeft(int $value): void
	{
		if (($this->current - $value) < self::MIN) {
			$rest = $value - $this->current;
			if ($this->countEveryDialPointZero && $this->current !== self::MIN) {
				++$this->zeroCount;
			}
			$this->current = self::MAX;
			$this->rotateLeft($rest);
		} else {
			$this->current -= $value;
		}
	}
}
