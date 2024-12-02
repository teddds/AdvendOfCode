<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

enum Direction: string
{
	case NORTH = 'n';
	case WEST = 'w';
	case EAST = 'e';
	case SOUTH = 's';
}
