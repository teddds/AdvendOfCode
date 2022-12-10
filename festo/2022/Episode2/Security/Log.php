<?php declare(strict_types=1);

namespace Festo\Y2022\Episode2;

use Carbon\Carbon;

class Log {

	public const IN = 'in';
	public const OUT = 'out';
	public array $in = [];
	public array $out = [];
	public \DateTime $time;

	public static function fromInput(array $lines): self {
		$log = new self();
		foreach($lines as $line){
			if(preg_match('/^\d{2}:\d{2}$/', $line)){
				$log->time = Carbon::createFromFormat('H:i', $line);
			}elseif(preg_match('/^(in|out):(.*)$/', $line, $match)){
				$persons = array_map(fn(string $name) => trim($name), explode(',', $match[2]));
				$log->{$match[1]} = $persons;
			}
		}
		return $log;
	}
}