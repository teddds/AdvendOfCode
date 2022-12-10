<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day8;
class Tree
{
	public int $size = 0;
	public int $x = 0;
	public int $y = 0;

	public ?Tree $left;
	public ?Tree $top;
	public ?Tree $down;
	public ?Tree $right;

	const LEFT = 'left';
	const TOP = 'top';
	const RIGHT = 'right';
	const DOWN = 'down';

	public function getScenicScore(): int {

		$left = $this->getAmountTreesUntiViewIsBlocked($this->getFromTo(self::LEFT));
		$rigth = $this->getAmountTreesUntiViewIsBlocked($this->getFromTo(self::RIGHT));
		$top = $this->getAmountTreesUntiViewIsBlocked($this->getFromTo(self::TOP));
		$down = $this->getAmountTreesUntiViewIsBlocked($this->getFromTo(self::DOWN));

		return $left * $rigth * $top * $down;
	}

	public function isVisible(): bool {
		//Proof all directions
		if($this->isVisibleInArrayOfTrees($this->getFromTo(self::LEFT))){
			return true;
		}
		if($this->isVisibleInArrayOfTrees($this->getFromTo(self::RIGHT))){
			return true;
		}
		if($this->isVisibleInArrayOfTrees($this->getFromTo(self::TOP))){
			return true;
		}
		if($this->isVisibleInArrayOfTrees($this->getFromTo(self::DOWN))){
			return true;
		}
		return false;
	}

	public function getTreesInRow(): array {
		return [...$this->getFromTo(self::LEFT), ...$this->getFromTo(self::RIGHT)];
	}

	public function getTreesInCol(): array {
		return [...$this->getFromTo(self::TOP), ...$this->getFromTo(self::DOWN)];
	}

	/**
	 * @param Tree[] $trees
	 * @return void
	 */
	private function isVisibleInArrayOfTrees(array $trees): bool {
		$max = 0;
		foreach($trees as $tree){
			if($tree->size >= $this->size){
				return false;
			}
		}
		return true;
	}

	/**
	 * @param Tree[] $trees
	 * @return void
	 */
	private function getAmountTreesUntiViewIsBlocked(array $trees): int {
		$amount = 0;
		foreach($trees as $tree){
			$amount++;
			if($tree->size >= $this->size){
				break;
			}
		}
		return $amount;
	}


	private function getFromTo(string $from): array {
		$row = [];
		$tree = $this->{$from};
		while($tree){
			$row[] = $tree;
			$tree = $tree->{$from};
		}
		return $row;
	}
}