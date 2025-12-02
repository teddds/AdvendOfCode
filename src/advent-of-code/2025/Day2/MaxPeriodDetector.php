<?php
declare(strict_types=1);

namespace AdventOfCode\Y2025\Day2;

/**
 * https://www.linkedin.com/pulse/efficient-pattern-matching-knuth-morris-pratt-algorithm-ali-raza-hp12e
 * Knuth-Morris-Pratt Algorithm
 */
class MaxPeriodDetector
{
	private string $string;
	private int $length;

	public function __construct(string $string)
	{
		$this->string = $string;
		$this->length = strlen($string);
	}

	/**
	 * Liefert die Anzahl der Wiederholungen der maximalen Periode
	 * oder NULL, wenn der String nicht periodisch ist.
	 *
	 * Beispiele:
	 * "abcabcabcabc" → 2 (maximale Periode-Länge = 6, zwei Wiederholungen)
	 * "11" → 2 (maximale Periode-Länge = 1, zwei Wiederholungen)
	 * "abcd" → null (nicht periodisch)
	 */
	public function getMaxPeriodCount(): ?int
	{
		if ($this->length === 0) {
			return null;
		}

		$pi = $this->prefixFunction($this->string);
		$base = $this->length - $pi[$this->length - 1];

		// Wenn base == length oder nicht teilbar -> keine vollständige Periodizität
		if ($base === $this->length || $this->length % $base !== 0) {
			return null;
		}

		$k = intdiv($this->length, $base); // Anzahl der kleinsten-Blöcke

		// Wenn k == 1 dann keine Wiederholung
		if ($k === 1) {
			return null;
		}

		// größter Teiler von k < k (darf 1 sein)
		$dMax = 1;
		for ($d = $k - 1; $d >= 1; --$d) {
			if ($k % $d === 0) {
				$dMax = $d;
				break;
			}
		}

		// Anzahl der Wiederholungen der maximalen Periode:
		return intdiv($k, $dMax);
	}

	private function prefixFunction(string $s): array
	{
		$n = strlen($s);
		$pi = array_fill(0, $n, 0);

		for ($i = 1; $i < $n; ++$i) {
			$j = $pi[$i - 1];
			while ($j > 0 && $s[$i] !== $s[$j]) {
				$j = $pi[$j - 1];
			}
			if ($s[$i] === $s[$j]) {
				++$j;
			}
			$pi[$i] = $j;
		}

		return $pi;
	}
}
