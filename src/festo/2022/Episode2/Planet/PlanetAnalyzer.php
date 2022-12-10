<?php declare(strict_types=1);

namespace Festo\Y2022\Episode2;

use NumPHP\Core\NumArray;
use NumPHP\Core\NumPHP;
use Regression\Matrix;
use Regression\Regression;

class PlanetAnalyzer {

	private const X = 'x';
	private const Z = 'y';
	private const Y = 'z';

	private string $pathList;
	private const INPUT_GALAXYMAP = __DIR__ . DIRECTORY_SEPARATOR . 'galaxy_map.txt';

	public function __construct(?string $list = null) {
		$this->pathList = $list ?? self::INPUT_GALAXYMAP;
	}

	public function getPlane(): Planet {

		$tmp_A = [];
		$tmp_b = [];

		foreach($this->getPlanet() as $sample){
			$tmp_A[] = [
				$sample->x, $sample->y
			];
			$tmp_b[] = [$sample->z];
		}

		$tmp_A = [
			[1,1],
			[1,2],
			[1,3],
			[2,1],
			[2,2],
			[2,3],
			[3,1],
			[3,2],
			[3,3],
		];
		$tmp_b = [
			[9],
			[14],
			[20],
			[11],
			[17],
			[23],
			[15],
			[20],
			[26],
		];

		$regression = new Regression();
		$regression->setX(new Matrix($tmp_A));
		$regression->setY(new Matrix($tmp_b));
		$regression->exec();


//		$tmp_A = [];
//		$tmp_b = [];
//		foreach($xs as $key => $valu){
//			$tmp_A[] = [$xs[$key], $ys[$key], 1];
//			$tmp_b[] = $zs[$key];
//		}
//		$b = new NumArray($tmp_b);
//		$A = new NumArray($tmp_A);
//
//		$fit = ($A->getTranspose()->dot($A))-> * $A->mult())


		$medianplanet = new Planet();
		$medianplanet->name = 'Median';
		foreach($median as $key => $array){
			$medianplanet->{$key} = (int) (array_sum($array)/count($array));
		}

		return $medianplanet;
	}

	public function getPlanet(): \Generator {
		foreach(\Utils::readFile($this->pathList) as $line){
			$line = trim($line);

			if($p = $this->getPlanetFromLine($line)){
				yield $p;
			}
		}
	}

	public function getPlanetByName(string $name): ?Planet {
		foreach(\Utils::readFile($this->pathList) as $line){
			if(str_contains($line, $name)){
				$line = trim($line);
				return $this->getPlanetFromLine($line);
			}
		}
		return null;
	}

	private function getPlanetFromLine(string $line): ?Planet{
		if(preg_match('/^(.*):\s\(\s*([-]*\d+),\s+([-]*\d+),\s+([-]*\d+)/', $line, $matches)){
			$p = new Planet();
			$p->name = trim($matches[1]);
			$p->x = (int) $matches[2];
			$p->y = (int) $matches[3];
			$p->z = (int) $matches[4];

			return $p;
		}

		return null;
	}

}