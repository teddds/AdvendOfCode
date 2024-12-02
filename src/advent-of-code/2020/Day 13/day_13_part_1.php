<?php
declare(strict_types=1);

namespace AdventOfCode\Y2020\Day13\Part1;

$source = '1002632
23,x,x,x,x,x,x,x,x,x,x,x,x,41,x,x,x,x,x,x,x,x,x,829,x,x,x,x,x,x,x,x,x,x,x,x,13,17,x,x,x,x,x,x,x,x,x,x,x,x,x,x,29,x,677,x,x,x,x,x,37,x,x,x,x,x,x,x,x,x,x,x,x,19';

// $source = '939
// 7,13,x,x,59,x,31,19';

class Navigator
{
	/** @var Bus[] */
	private array $busses;
	private int $start;

	public function __construct(string $input)
	{
		$rows = explode("\n", $input);
		$this->start = (int) $rows[0];
		foreach (explode(',', $rows[1]) as $id) {
			if ($id === 'x') {
				continue;
			}
			$this->busses[$id] = new Bus((int) $id);
		}
	}

	public function getMultipliedTime(): int
	{
		$bus = $this->getNexBus();

		return ($bus->nextStart - $this->start) * $bus->id;
	}

	private function getNexBus(): Bus
	{
		$start = $this->start;
		while (true) {
			foreach ($this->busses as $bus) {
				if ($start % $bus->id === 0) {
					$bus->nextStart = $start;

					return $bus;
				}
			}

			++$start;
		}
	}
}

class Bus
{
	public int $id;
	public int $nextStart = 0;

	public function __construct(int $id)
	{
		$this->id = $id;
	}
}

$navigator = new Navigator($source);
echo $navigator->getMultipliedTime();
