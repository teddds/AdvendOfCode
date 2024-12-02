<?php
declare(strict_types=1);
$m = 1024 * 16;
ini_set('memory_limit', $m . 'M');
$source = '99
3
1
11
48
113
131
43
82
19
4
153
105
52
56
109
27
119
147
31
34
13
129
17
61
10
29
24
12
104
152
103
80
116
79
73
21
133
44
18
74
112
136
30
146
100
39
130
91
124
70
115
81
28
151
2
122
87
143
62
7
126
95
75
20
123
63
125
53
45
141
14
67
69
60
114
57
142
150
42
78
132
66
88
140
139
106
38
85
37
51
94
98
86
68';

// $source = '28
// 33
// 18
// 42
// 31
// 14
// 46
// 20
// 48
// 47
// 24
// 23
// 49
// 45
// 19
// 38
// 39
// 11
// 1
// 32
// 25
// 35
// 8
// 17
// 7
// 9
// 4
// 2
// 34
// 10
// 3';

// $source = '
// 16
// 10
// 15
// 5
// 1
// 11
// 7
// 19
// 6
// 12
// 4
// ';
class AdapterCalculator
{
	private const MAX_HIGHER_THAN = 3;
	private array $rows;
	private array $rowsKeys;
	private int $max;
	private int $min = 0;
	private int $length;
	private array $distances_check;
	private int $time = 0;

	public function __construct(string $input)
	{
		$rows = array_map(static function (string $val) { return (int) $val; }, explode("\n", $input));
		$rows[] = $this->min;
		sort($rows);
		$this->max = end($rows) + self::MAX_HIGHER_THAN;
		$rows[] = $this->max;
		$this->rows = $rows;
		$this->rowsKeys = array_flip($rows);
		$this->length = count($this->rows);
		$this->distances_check = range(1, self::MAX_HIGHER_THAN, 1);
	}

	public function getDifferncesListMultplied(): int
	{
		$results = [];
		foreach ($this->rows as $index => $val) {
			if ($val === $this->max) {
				break;
			}
			foreach ($this->distances_check as $i) {
				$results[$i] ??= 0;
				if ($val + $i === $this->rows[$index + 1]) {
					++$results[$i];
				}
			}
		}

		return $results[1] * $results[3];
	}

	public function getArrangments(): int
	{
		$totalRoutes = 0;
		$this->startNewVarition($this->length - 1, $totalRoutes);

		return $totalRoutes;
	}

	public function getArrangments2(): int
	{
		$costs = [];
		$f = $this->startNewVarition2(0, $costs);

		return $f + 1;
	}

	private function startNewVarition(int $index, int &$totalRoutes): void
	{
		$found = false;
		foreach ($this->distances_check as $j) {
			$newValue = $this->rows[$index] - $j;
			if (isset($this->rowsKeys[$newValue])) {
				$found = true;
				$this->startNewVarition($this->rowsKeys[$newValue], $totalRoutes);
			}
		}
		if (!$found) {
			++$totalRoutes;

			$t = time();
			if ($t - $this->time > 1) {
				$this->time = $t;
				echo $totalRoutes . "\n";
			}
		}
	}

	private function startNewVarition2(int $index, array &$costs): int
	{
		$routes = [];

		$currentRouteCost = 0;

		foreach ($this->distances_check as $j) {
			$newValue = $this->rows[$index] + $j;
			if (isset($this->rowsKeys[$newValue])) {
				$routes[] = $newValue;
			}
		}

		if (!empty($routes)) {
			$currentRouteCost += count($routes) - 1;
		}

		foreach ($routes as $newValue) {
			if (!isset($costs[$newValue])) {
				$costs[$newValue] = $this->startNewVarition2($this->rowsKeys[$newValue], $costs);
			}
			$currentRouteCost += $costs[$newValue];
		}

		return $currentRouteCost;
	}
}

$adapter = new AdapterCalculator($source);
echo $adapter->getArrangments2();
