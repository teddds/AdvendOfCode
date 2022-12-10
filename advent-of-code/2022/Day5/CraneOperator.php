<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day5;
class CraneOperator
{

	private array $map;

	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	public function __construct(private ?string $path = null){
		$this->path ??= self::INPUT;
		$this->readStacks();
	}


	public function getMessage(bool $part2 = false): string {
		$this->applyOperations($part2);

		return implode('', array_map(fn(array $stack) => array_pop($stack), $this->map));
	}

	private function readStacks(): void {
		$len = 4;
		foreach(\Utils::readFile($this->path) as $row){
			if(empty($row) || !str_contains($row, '[')){
				break;
			}

			$start = 0;
			$i=0;
			while($tmp = substr($row, $start, $len)){
				if(!isset($this->map[$i])){
					$this->map[$i] = [];
				}

				if(preg_match('/(\w{1})/', $tmp, $match)){
					$this->map[$i][] = $match[1];
				}

				$i++;
				$start += $len;
			}

		}
		foreach($this->map as &$stack){
			$stack = array_reverse($stack);
		}
		unset($stack);
	}

	private function applyOperations(bool $part2): void{
		foreach(\Utils::readFile($this->path) as $row){
			$row = trim($row);

			if(preg_match('/move (\d+) from (\d+) to (\d+)/', $row, $match)){
				$anzahl = $match[1];
				$von = (int) $match[2] - 1;
				$nach = (int) $match[3] - 1;

				if($part2){
					$tmp = [];
					for($i=0; $i<$anzahl; $i++){
						$tmp[] = array_pop($this->map[$von]);
					}
					$this->map[$nach] = array_merge($this->map[$nach], array_reverse($tmp));
				}else{
					for($i=0; $i<$anzahl; $i++){
						$this->map[$nach][] = array_pop($this->map[$von]);
					}
				}

			}
		}
	}


}