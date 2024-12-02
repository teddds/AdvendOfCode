<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day9;

use Exception;

enum Direction: string
{
	case LEFT = 'L';
	case RIGHT = 'R';
	case UP = 'U';
	case DOWN = 'D';

	public function getFullname(): string
	{
		return match ($this) {
			self::LEFT => 'Left',
			self::RIGHT => 'Right',
			self::UP => 'Up',
			self::DOWN => 'Down',
			default => throw new Exception('Unexpected match value'),
		};
	}
}
