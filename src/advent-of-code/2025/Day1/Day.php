<?php
declare(strict_types=1);

namespace AdventOfCode\Y2025\Day1;

use Utils;

final class Day
{
	public function __construct(private readonly string $inputPath) {}

	public function getPassword(bool $countEveryDialPointZero = false): int
	{
		$safeRotator = new SafeRotator($countEveryDialPointZero);
		foreach (Utils::readFile($this->inputPath) as $line) {
			if (preg_match('/(L|R)(\d+)/i', $line, $matches)) {
				$safeRotator->runCommand((int) $matches[2], $matches[1]);
			}
		}

		return $safeRotator->getPassword();
	}
}
