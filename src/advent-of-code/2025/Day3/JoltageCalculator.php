<?php
declare(strict_types=1);

namespace AdventOfCode\Y2025\Day3;

final class JoltageCalculator
{
	private array $strArr;
	private int $lenth;

	public function __construct(private string $line)
	{
		$this->strArr = str_split($line);
		$this->lenth = count($this->strArr);
	}

	public function getMaxVoltage(int $maxBatteries): int
	{
		$max = 0;

		foreach ($this->nextNumber($maxBatteries) as $number) {
			if ($number >= $max) {
				$max = $number;
			}
		}

		//		for ($i = 0; $i < $this->lenth - 1; ++$i) {
		//			for ($j = $i + 1; $j < $this->lenth; ++$j) {
		//				$number = (int) ($this->strArr[$i] . $this->strArr[$j]);
		//				if ($number >= $max) {
		//					$max = $number;
		//				}
		//			}
		//		}

		return $max;
	}

	private function nextNumber(int $batteries): iterable
	{
		for ($i = 0; $i < $this->lenth; ++$i) {
            for ($j = $i + 1; $j < $this->lenth; ++$j) {
                $numbers = [];
                $numbers[] = $this->strArr[$i];

                while (true) {
                    if (!isset($this->strArr[$j]) || count($numbers) >= $batteries) {
                        $j--;
                        break;
                    }
                    $numbers[] = $this->strArr[$j];
                    $j++;
                }

                yield (int)implode('', $numbers);
            }
		}
	}
}
