<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day9;
class Head extends Base
{


	public function left(int $count){
		$this->move(self::LEFT, $count);
	}

	public function up(int $count){
		$this->move(self::UP, $count);
	}

	public function down(int $count){
		$this->move(self::DOWN, $count);
	}

	public function right(int $count){
		$this->move(self::RIGHT, $count);
	}

	private function move(string $direction, int $count){
		$fn = 'moveOne' . $direction;
		$first = true;
		do{
			$this->{$fn}();
			if($first === false){
				$this->operator->tail->{$fn}();
			}
			$first = false;
			$this->operator->print();
			$count--;
		}while($count > 0);
	}
}