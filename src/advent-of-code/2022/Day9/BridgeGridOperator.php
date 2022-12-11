<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day9;
class BridgeGridOperator
{

	public Knot $head;

	private int $min_x;
	private int $max_x;
	private int $min_y;
	private int $max_y;

	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	public function __construct(private ?string $path = null, private $printing = false, int $knots = 1){
		$this->path ??= self::INPUT;
		$this->head = new Knot($this);

		$prev = $this->head;
		for($i=0; $i<$knots; $i++){
			$a = new Knot($this);
			$a->name = (string) ($i+1);
			$prev->next = $a;
			$prev = $a;
		}

	}


	public function getUsedTilesByTail(): int {
		$this->calcDimensions();
		$this->applyOperations();
		$cnt = 0;

		array_walk_recursive($this->head->getLastKnot()->grid, function() use (&$cnt) { $cnt++; } );
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

		$prevHead = new Knot($this);
		foreach (\Utils::readFile($this->path) as $row) {
			[$direction, $steps] = sscanf($row, "%s %d");
			$this->print(trim($row));

			$d = Direction::from($direction);
			$fn = 'moveOne' . $d->getFullname();

			for(;$steps > 0; $steps--){
				$this->head->{$fn}();
				$this->print();
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
					}elseif(isset($this->head->getLastKnot()->grid[$i][$j])){
						echo '# ';
					}else{
						echo '. ';
					}
				}else{

					$writing = [];
					foreach($this->head->getKnots() as $knot){
						if($knot->x === $j && $knot->y === $i){
							if($isStart){
								$covers[$knot->name[0]][] = 's';
							}
							$writing[] = $knot->name[0];
						}
					}

					if(empty($writing)){
						if($isStart){
							echo 's ';
						}else{
							echo '. ';
						}
					}else{
						echo $writing[0]. ' ';
						for($m=1; $m<count($writing); $m++){
							$covers[$writing[0]][] = $writing[$m];
						}
					}

//					$isHead = $this->head->x === $j && $this->head->y === $i;
//
//					$isTail = $this->head->next->x === $j && $this->head->next->y === $i;
//					if($isHead){
//						if($isTail){
//							$covers['H'][] = 'T';
//						}
//						if($isStart){
//							$covers['H'][] = 's';
//						}
//						echo 'H ';
//					}elseif($isTail){
//						if($isStart){
//							$covers['T'][] = 's';
//						}
//						echo 'T ';
//					}elseif($isStart){
//						echo 's ';
//					}else{
//						echo '. ';
//					}
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