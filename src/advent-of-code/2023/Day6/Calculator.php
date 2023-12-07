<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day6;

final class Calculator
{
	public static function getTotalDistance(int $timeAccelerate, int $totalTime): int
	{
		// gleichmäßig beschleunigte Bewegung -> s = a/2 * t² + (V0 * t + S0)-> V0 == 0 und S0
		// gleichförmige Bewegung -> s = v * t + S0
		$a = 1;
		$v = $a * $timeAccelerate;
		$timeConstMove = $totalTime - $timeAccelerate;

		return (int) (
			($a / 2) * ($timeAccelerate ** 2)
			+ $v * $timeConstMove
		);
	}

	public static function getLinearDistance(int $timeAccelerate, int $totalTime): int
	{
		$a = 1;
		$v = $a * $timeAccelerate;
		$timeConstMove = $totalTime - $timeAccelerate;

		return $v * $timeConstMove;
	}
}
