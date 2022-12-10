<?php declare(strict_types=1);

namespace Festo\Y2022\Episode2;

class PopulationAnalyzer {

	private string $pathList;
	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'population.txt';

	public function __construct(?string $list = null) {
		$this->pathList = $list ?? self::INPUT;
	}

	public function getPerson(): \Generator {

		$keys = [
			'Name:' => 'name',
			'ID:' => 'id',
			'Home Planet:' => 'planet',
		];

		foreach($this->readSampleString() as $sample){
			$p = new Person();
			foreach($keys as $key => $var){
				if(preg_match('/' . preg_quote($key, '/') .' (.*)/', $sample, $match)){

					if($var === 'id'){
						$p->{$var} = (int) $match[1];
					}else{
						$p->{$var} = $match[1];
					}


				}
			}

			if(preg_match_all('/\|(.*)\|/', $sample, $matches, PREG_SET_ORDER)){
				$bs = new BloodSample();
				$bs->setSampleFromString(array_map(fn($item) => $item[1], $matches));
				$p->bloodSample = $bs;
			}

			yield $p;
		}
	}

	private function readSampleString(): \Generator {
		$tmp = '';
		foreach(\Utils::readFile($this->pathList) as $line){
			$line = trim($line);
			if(empty($line)){
				if($tmp){
					yield $tmp;
					$tmp = '';
				}
			}else{
				$tmp .= $line ."\n";
			}
		}
	}

	public function getPersonsWithPositivePICOBloodSamples(): \Generator {
		$i = 0;
		$start = microtime(true);
		foreach($this->getPerson() as $sample){
			$i++;
			echo sprintf(
				'analyse Sample: %u [%.2f]MB %.2f Samples/Sekunde'."\n",
				$i,
				memory_get_usage(true)/1204/1024,
				$i/(microtime(true)-$start)
			);
			if($sample->bloodSample->hasPico()){
				yield $sample;
			}
		}
	}

	public function hasPICOSamples(): bool {
		foreach($this->getPerson() as $sample){
			if($sample->hasPico()){
				return true;
			}
		}

		return false;
	}
}