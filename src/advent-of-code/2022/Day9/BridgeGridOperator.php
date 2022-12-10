<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day9;
class BridgeGridOperator
{

	public Head $head;
	public Tail $tail;

	private int $min_x;
	private int $max_x;
	private int $min_y;
	private int $max_y;

	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'input_maik.txt';

	public function __construct(private ?string $path = null, private $printing = false){
		$this->path ??= self::INPUT;
		$this->tail = new Tail($this);
		$this->head = new Head(	$this);

	}


	public function getUsedTilesByTail(): int {
		$this->calcDimensions();
		$this->applyOperations();
		$cnt = 1;

		array_walk_recursive($this->tail->tiles, function() use (&$cnt) { $cnt++; } );
		return $cnt;
	}

	private function calcDimensions(): void {
		$max_x = 0;
		$min_x = 0;
		$max_y = 0;
		$min_y = 0;
		$x = 0;
		$y = 0;
		foreach (\Utils::readFile($this->path) as $row) {
			$row = trim($row);
			if(preg_match('/(R|U|L|D)\s+(\d+)/', $row, $match)){
				switch($match[1]){
					case 'L': $x -= (int) $match[2]; break;
					case 'R': $x += (int) $match[2]; break;
					case 'U': $y -= (int) $match[2]; break;
					case 'D': $y += (int) $match[2]; break;
				}

				$max_x = max($max_x, $x);
				$min_x = min($min_x, $x);
				$max_y = max($max_y, $y);
				$min_y = min($min_y, $y);
			}
		}

		$this->min_x = $min_x;
		$this->min_y = $min_y;
		$this->max_x = $max_x;
		$this->max_y = $max_y;
	}


	private function applyOperations(): void
	{

		$this->print('Initial State');

		foreach (\Utils::readFile($this->path) as $row) {
			$row = trim($row);
			if(preg_match('/(R|U|L|D)\s+(\d+)/', $row, $match)){
				$this->print($row);
				switch($match[1]){
					case 'R':
						$this->head->right((int) $match[2]); break;
					case 'U':
						$this->head->up((int) $match[2]); break;
					case 'L':
						$this->head->left((int) $match[2]); break;
					case 'D':
						$this->head->down((int) $match[2]); break;
				}
			}
		}

		$this->print('Slope', true);
	}

	public function print(string $message = '', bool $slope = false){
		if(!$this->printing){
			return;
		}
		if(!empty($message)){
			echo '== '.$message . ' =='." \n\n";
		}

		for($i=$this->min_y; $i<=$this->max_y; $i++){
			$covers = [];
			for($j=$this->min_x; $j<=$this->max_x; $j++){
				$isStart = 0 === $j && 0 === $i;
				if($slope){
					if($isStart){
						echo 's ';
					}elseif(isset($this->tail->tiles[$i][$j])){
						echo '# ';
					}else{
						echo '. ';
					}
				}else{
					$isHead = $this->head->x === $j && $this->head->y === $i;
					$isTail = $this->tail->x === $j && $this->tail->y === $i;
					if($isHead){
						if($isTail){
							$covers['H'][] = 'T';
						}
						if($isStart){
							$covers['H'][] = 's';
						}
						echo 'H ';
					}elseif($isTail){
						if($isStart){
							$covers['T'][] = 's';
						}
						echo 'T ';
					}elseif($isStart){
						echo 's ';
					}else{
						echo '. ';
					}
				}
			}
			if(!empty($covers)){
				foreach($covers as $origin => $cover){
					echo '  ('.$origin.' covers '.implode(', ', $cover).')';
				}
			}
			echo "\n";
		}

		echo "\n";
	}


}