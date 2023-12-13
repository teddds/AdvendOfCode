<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day10;

enum Operation: string
{
	case VERTICAL_PIPE = '|';
	case HORIZONTAL_PIPE = '-';
	case NORTH_TO_EAST = 'L';
	case NORTH_TO_WEST = 'J';
	case SOUTH_TO_WEST = '7';
	case SOUTH_TO_EAST = 'F';
	case START = 'S';

	/**
	 * @return OperationOffset[]
	 */
	public function getOffsets(): array
	{
		if ($this === self::START) {
			return [
				new OperationOffset(y: -1),
				new OperationOffset(y: +1),
				new OperationOffset(x: -1),
				new OperationOffset(x: +1),
			];
		}

		if ($this === self::VERTICAL_PIPE) {
			return [
				new OperationOffset(y: -1),
				new OperationOffset(y: +1),
			];
		}

		if ($this === self::HORIZONTAL_PIPE) {
			return [
				new OperationOffset(x: -1),
				new OperationOffset(x: +1),
			];
		}

		if ($this === self::NORTH_TO_EAST) {
			return [
				new OperationOffset(y: -1),
				new OperationOffset(x: +1),
			];
		}

		if ($this === self::NORTH_TO_WEST) {
			return [
				new OperationOffset(y: -1),
				new OperationOffset(x: -1),
			];
		}

		if ($this === self::SOUTH_TO_WEST) {
			return [
				new OperationOffset(y: +1),
				new OperationOffset(x: -1),
			];
		}

		if ($this === self::SOUTH_TO_EAST) {
			return [
				new OperationOffset(y: +1),
				new OperationOffset(x: +1),
			];
		}
	}
}
