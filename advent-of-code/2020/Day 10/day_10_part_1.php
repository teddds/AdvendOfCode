<?php
declare(strict_types=1);

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

$source = '16
10
15
5
1
11
7
19
6
12
4';

$rows = array_map(static function(string $val){ return (int) $val;},explode("\n", $source));
$rows[] = 0;
sort($rows);
$max_higher_than = 3;
$max = end($rows) + $max_higher_than;
$rows[] = $max;
$results = [];
foreach($rows as $index => $val){
	if($val === $max){
		break;
	}
	for($i=1; $i<=$max_higher_than; $i++){
		$results[$i] ??=0;
		if($val + $i === $rows[$index+1]){
			$results[$i]++;
		}
	}
}

var_dump($results[1] * $results[3]);


