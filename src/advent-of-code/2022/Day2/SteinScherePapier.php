<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day2;

enum SteinScherePapier: int
{
	case STEIN = self::STEIN_SCORE;
	case PAPIER = self::PAPIER_SCORE;
	case SCHERE = self::SCHERE_SCORE;

	private const STEIN_SCORE = 1;
	private const PAPIER_SCORE = 2;
	private const SCHERE_SCORE = 3;

	private const WIN = 6;
	private const LOST = 0;
	private const DRAW = 3;

	public function getInputChar()
	{
		return match ($this) {
			self::STEIN => 'A',
			self::PAPIER => 'B',
			self::SCHERE => 'C',
		};
	}

	public function getResponseChar()
	{
		return match ($this) {
			self::STEIN => 'X',
			self::PAPIER => 'Y',
			self::SCHERE => 'Z',
		};
	}

	public function isKilledBy()
	{
		return match ($this) {
			self::STEIN => self::PAPIER,
			self::PAPIER => self::SCHERE,
			self::SCHERE => self::STEIN,
		};
	}

	public function beatAndScore(self $b): int
	{
		if ($this->name === $b->name) {
			return self::DRAW + $b->value;
		}
		if ($b === $this->isKilledBy()) {
			return self::WIN + $b->value;
		}

		return self::LOST + $b->value;
	}

	public static function fromInput(string $input): self
	{
		return match ($input) {
			'A' => self::STEIN,
			'B' => self::PAPIER,
			'C' => self::SCHERE,
		};
	}

	public static function fromResponse(string $input): self
	{
		return match ($input) {
			'X' => self::STEIN,
			'Y' => self::PAPIER,
			'Z' => self::SCHERE,
		};
	}

	public static function fromInputAndDeservedOperation(self $input, string $deservedOperation): self
	{
		return match ($deservedOperation) {
			'X' => $input->isKilledBy()->isKilledBy(),
			'Y' => $input,
			'Z' => $input->isKilledBy(),
		};
	}
}
