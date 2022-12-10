<?php declare(strict_types=1);

namespace Festo\Y2022\Episode2;

use NumPHP\Core\NumArray;

class Plane {

	public NumArray $A;
	public NumArray $B;
	public NumArray $C;

	public function getEbenegleichung(){

	}

	private function getOA(): NumArray {
		return $this->A;
	}

	private function getAB(): NumArray {
		return $this->B->sub($this->A);
	}

	private function getAC(): NumArray {
		return $this->C->sub($this->A);
	}

}