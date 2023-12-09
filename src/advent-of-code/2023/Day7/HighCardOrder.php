<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day7;

use LogicException;

enum HighCardOrder: int
{
	case ONE = 1;
	case TWO = 2;
	case THREE = 3;
	case FOUR = 4;
	case FIVE = 5;
	case SIX = 6;
	case SEVEN = 7;
	case EIGHT = 8;
	case NINE = 9;
	case TEN = 10;
	case BOY = 11;
	case QUEEN = 12;
	case KING = 13;
	case ASS = 14;

	public const MAPPING = [
		'A' => self::ASS,
		'K' => self::KING,
		'Q' => self::QUEEN,
		'J' => self::BOY,
		'T' => self::TEN,
		'9' => self::NINE,
		'8' => self::EIGHT,
		'7' => self::SEVEN,
		'6' => self::SIX,
		'5' => self::FIVE,
		'4' => self::FOUR,
		'3' => self::THREE,
		'2' => self::TWO,
	];

	public static function fromMapping(string $char, bool $joker): static
	{
		if ($joker && $char === 'J') {
			return self::ONE;
		}

		return self::MAPPING[$char] ?? throw new LogicException('not implemened char "' . $char . '"');
	}
}
