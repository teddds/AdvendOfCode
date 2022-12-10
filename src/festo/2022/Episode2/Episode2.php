<?php
declare(strict_types=1);
namespace Festo\Y2022\Episode2;
include "../../../vendor/autoload.php";

class Episode2
{
	private PopulationAnalyzer $populationAnalyzer;
	private PlanetAnalyzer $planetAnalyzer;
	private SecurityAnalyzer $securityAnalyzer;
	/** @var Person[] */
	private array $poi = [];

	public function __construct()
	{
		$this->populationAnalyzer = new PopulationAnalyzer();
		$this->planetsAnalyzer = new PlanetAnalyzer();
		$this->securityAnalyzer = new SecurityAnalyzer();
	}

	public function filterByBloodSamples(){
		foreach($this->populationAnalyzer->getPersonsWithPositivePICOBloodSamples() as $person){
			$this->poi[] = $person;
		}

		echo array_sum(array_map(fn(Person $sample) => $sample->id, $this->poi))  . "\n";
	}

	public function filterBySecuritylog(): void {
		$poi = [];

		foreach($this->securityAnalyzer->readLocation() as $location){
			foreach($location->log as $log){
				$ts = $log->time->getTimestamp();
				foreach($log->in as $person){
					$poi[$person][$ts] = [$location->name, Log::IN];
				}

				foreach($log->out as $person){
					$poi[$person][$ts] = [$location->name, Log::OUT];
				}
			}
		}

		foreach($poi as $person => &$ts){
			ksort($ts, SORT_NUMERIC);
		}

		$poib = $poi;

		foreach($this->securityAnalyzer->getSequence() as $location){
			foreach($poi as $key => $person){
				if(!is_array($person)){
					unset($poi[$key]);
					continue;
				}
				foreach($person as $ts => $log){
					if($log[0] !== $location[0] || $log[1] !== $location[1]){
						unset($poi[$key]);
						break;
					}
					unset($poi[$key][$ts]);
					break;
				}
			}
		}

		foreach($poi as $name => $person){
			if(!empty($person)){
				unset($poi[$name]);
			}
		}

		//Gesamtliste nach Places filtern


		foreach($this->poi as $key => $person){
			if(!isset($poi[$person->name])){
				unset($this->poi[$key]);
			}
		}

		$summe = 0;
		foreach($this->populationAnalyzer->getPerson() as $person){
			if(isset($poi[$person->name])){
				$summe += $person->id;
			}
		}
		echo $summe . "\n";
	}

	public function filterByHomePlanets(){
		$median = $this->planetsAnalyzer->getPlane();

		$home_planets = [];

		foreach($this->planetsAnalyzer->getPlanet() as $planet){
			if($planet->isOutlierPlanet($median)){
				$home_planets[$planet->name] = $planet->name;
			}
		}

		$this->poi = array_filter($this->poi, fn(Person $s) => isset($home_planets[$s->planet]));

	}
}

$ep2 = new Episode2();
//$ep2->filterByBloodSamples();
$ep2->filterByHomePlanets();
$ep2->filterBySecuritylog();