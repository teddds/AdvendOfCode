<?php declare(strict_types=1);

namespace Festo\Y2022\Episode2;

use Carbon\Carbon;

class SecurityAnalyzer {

	private string $pathList;
	private string $sequence;
	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'security_log.txt';
	private const PLACE_SEQUENCE = __DIR__ . DIRECTORY_SEPARATOR . 'place_sequence.txt';
	public function __construct(?string $list = null, ?string $sequence =null) {
		$this->pathList = $list ?? self::INPUT;
		$this->sequence = $list ?? self::PLACE_SEQUENCE;
	}

	public function getLogFrom(string $location): \Generator {

		foreach($this->readLocation() as $loc){
			if($loc->name === $location){
				yield $loc;
			}
		}
	}

	public function getSequence(): \Generator {
		foreach(\Utils::readFile($this->sequence) as $line){
			$line = trim($line);
			foreach([Log::IN, Log::OUT] as $in_out){
				yield [$line, $in_out];
			}

		}
	}

	public function readLocation(): \Generator {

		$location = null;
		foreach(\Utils::readFile($this->pathList) as $line){
			$line = trim($line);
			if(preg_match('/^Place:(.+)$/', $line, $match)){
				if($location){
					yield $location;
				}
				$location = new Location();
				$location->name = trim($match[1]);
				continue;
			}
			if(empty($line)){
				if(!empty($logs)){
					$location->log[] = Log::fromInput($logs);
				}
				$logs = [];
			}else{
				$logs[] = $line;
			}
		}
		yield $location;
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