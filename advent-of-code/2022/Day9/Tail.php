<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day9;
class Tail extends Base
{
	
	public array $tiles = [];

	public function moveOneUp(): void {
		$x = $this->x;
		$needMoveDiagonal = $this->needMoveDiagonal(self::UP);
		if($needMoveDiagonal){
			$x = $this->operator->head->x;
		}

		//Check Collusion
		if($this->checkCollosions($x, $this->y+1)){
			return;
		}

		$this->x = $x;
		parent::moveOneUp();
		$this->tiles[$this->y][$this->x] = 1;
	}

	public function moveOneDown(): void {
		$x = $this->x;
		$needMoveDiagonal = $this->needMoveDiagonal(self::DOWN);
		if($needMoveDiagonal){
			$x = $this->operator->head->x;
		}

		//Check Collusion
		if($this->checkCollosions($x, $this->y+1)){
			return;
		}

		$this->x = $x;
		parent::moveOneDown();
		$this->tiles[$this->y][$this->x] = 1;
	}

	public function moveOneLeft(): void {
		$y = $this->y;
		$needMoveDiagonal = $this->needMoveDiagonal(self::LEFT);
		if($needMoveDiagonal){
			$y = $this->operator->head->y;
		}

		//Check Collusion
		if($this->checkCollosions($this->x-1, $y)){
			return;
		}
		$this->y = $y;

		parent::moveOneLeft();
		$this->tiles[$this->y][$this->x] = 1;
	}
	public function moveOneRight(): void {
		$y = $this->y;
		$needMoveDiagonal = $this->needMoveDiagonal(self::RIGHT);
		if($needMoveDiagonal){
			$y = $this->operator->head->y;
		}

		//Check Collusion
		if($this->checkCollosions($this->x+1, $y)){
			return;
		}

		$this->y = $y;
		parent::moveOneRight();
		$this->tiles[$this->y][$this->x] = 1;
	}

	private function checkCollosions(int $x, int $y): bool {
		return $this->operator->head->x === $x && $this->operator->head->y === $y;
	}

	private function getCollosions(): array {
		return [
			$this->y-1 => [
				$this->x-1 => 1,
				$this->x => 1,
				$this->x+1 => 1,
			],

			$this->y => [
				$this->x-1 => 1,
				$this->x+1 => 1,
			],

			$this->y+1 => [
				$this->x-1 => 1,
				$this->x => 1,
				$this->x+1 => 1,
			],
		];
	}

	private function needMoveDiagonal(string $direction): bool {
		if(in_array($direction, [self::UP, self::DOWN], true)){
			//Y Achse ändert sich
			return $this->x !== $this->operator->head->x;
		}

		return $this->y !== $this->operator->head->y;
	}
}