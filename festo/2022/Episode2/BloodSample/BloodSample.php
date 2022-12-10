<?php declare(strict_types=1);
namespace Festo\Y2022\Episode2;

class BloodSample {

	private const PICO = 'pico';

	public array $sampleGrid = [];
	public string $name = '';
	public string $planet = '';
	public string $id = '';
	public string $intern_id = '';


	public function setSampleFromString(array $lines): void {
		$this->intern_id = md5(serialize([$lines, $this->id, $this->name, $this->planet]));
		$this->sampleGrid = self::createGridFromSample($lines);
	}

	/**
	 * @param array $lines
	 * @return array 2dArray of Blood Sample
	 */
	private static function createGridFromSample(array $lines): array {
		$xy = [];
		$y = 0;
		foreach($lines as $line){
			foreach(str_split($line) as $key => $char){
				$xy[$key][$y] = $char;
			}
			$y++;
		}
		return $xy;
	}

	public function hasPico(): bool {
		return
			$this->findPico(false) ||
			$this->findPico(true)
		;
	}

	private function findPico(bool $rotate): bool {

		$array = $this->sampleGrid;

		if($rotate){
			$array = array_map(fn(...$col) => array_reverse($col), ...$array);
		}

		foreach($array as $y){
			$sample = implode('', $y);
			if(str_contains($sample, self::PICO) || str_contains(strrev($sample), self::PICO)){
				return true;
			}
		}
		return false;
	}


}