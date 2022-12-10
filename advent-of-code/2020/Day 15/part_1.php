<?php
declare(strict_types=1);

$source = '0,3,6';

//$source = '17,1,3,16,19,0';

class ElveGame
{

	private array $startingNumbers = [];
	private int $breakOutNumber = -1;

	private int $round = 0;
	private int $lastSpokenNumber = 0;

	/** @var UsedNumber[] */
	private array $usedNumbers = [];

	public function __construct(string $input)
	{
		$this->startingNumbers = array_map(static fn(string $value) => (int) $value, explode(",", $input));
	}

	public function play(int $breakOutNumber): int {
		$this->breakOutNumber = $breakOutNumber;
		$this->round = 0;
		$this->lastSpokenNumber = 0;

		do{
			$this->playRound();
		}while($this->round < $breakOutNumber);

		return $this->lastSpokenNumber;
	}

	private function playRound(): void {
		if(isset($this->startingNumbers[$this->round])){
			$this->lastSpokenNumber = $this->startingNumbers[$this->round];
		}else {
			if (
				!isset($this->usedNumbers[$this->lastSpokenNumber]) ||
				$this->usedNumbers[$this->lastSpokenNumber]->getTotalUse() === 1
			) {
				$this->lastSpokenNumber = 0;
			} else {
				$this->lastSpokenNumber = $this->round - $this->usedNumbers[$this->lastSpokenNumber];
			}
		}

		if(!isset($this->usedNumbers[$this->lastSpokenNumber])){
			$this->usedNumbers[$this->lastSpokenNumber] = new UsedNumber($this->round, $this->lastSpokenNumber);
		}else{
			$this->usedNumbers[$this->lastSpokenNumber]->setLastRound($this->round);
		}

		$this->round++;
	}
}

class UsedNumber {
	private int $lastRound;
	private int $number;
	private int $totalUse = 0;

	public function __construct(int $lastRound, int $number) {
		$this->lastRound = $lastRound;
		$this->number = $number;
	}

	/**
	 * @return int
	 */
	public function getLastRound(): int {
		return $this->lastRound;
	}

	/**
	 * @return int
	 */
	public function getNumber(): int {
		return $this->number;
	}

	/**
	 * @param int $lastRound
	 */
	public function setLastRound(int $lastRound): void {
		$this->lastRound = $lastRound;
		$this->totalUse++;
	}

	/**
	 * @param int $number
	 */
	public function setNumber(int $number): void {
		$this->number = $number;
	}

	/**
	 * @return int
	 */
	public function getTotalUse(): int {
		return $this->totalUse;
	}
}

$navigator = new ElveGame($source);
echo $navigator->play(2020);