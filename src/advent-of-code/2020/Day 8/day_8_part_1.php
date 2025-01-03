<?php
declare(strict_types=1);

namespace AdventOfCode\Y2020\Day8\Part1;

$source = 'nop +355
acc +46
jmp +42
jmp +585
acc +11
acc +0
acc +40
jmp +284
acc -2
nop +276
jmp +613
acc +23
acc +2
acc +14
acc +25
jmp +310
acc +43
acc +43
jmp +510
jmp +116
jmp +204
nop +213
acc +47
jmp +1
acc +8
jmp +461
jmp -22
acc +36
acc +33
acc +45
jmp +175
acc +21
jmp +472
acc +50
acc +40
jmp +525
acc +26
nop +208
jmp +496
jmp +153
acc +50
acc +24
nop +512
jmp +242
acc +7
nop +317
acc +50
acc +7
jmp +268
acc +8
acc -19
acc -11
jmp +1
jmp +383
acc +1
jmp +230
acc +5
jmp +128
nop +227
acc -7
jmp -16
acc +11
acc -6
jmp -42
acc +11
acc +23
jmp +7
jmp -23
jmp +11
acc +0
nop +246
acc +24
jmp +213
jmp +550
acc +24
acc +14
acc +34
acc -6
jmp +525
acc +4
nop +220
jmp +399
acc +41
jmp +34
acc -2
acc +38
acc +48
acc -7
jmp +136
acc -2
acc +40
acc +12
acc -4
jmp +467
acc +36
acc +19
nop +518
jmp +328
acc +7
nop +263
acc +19
acc -17
jmp +282
jmp +206
acc +28
acc +7
jmp +417
acc -10
jmp -75
nop +475
nop +68
nop -38
acc +33
jmp +367
acc +0
jmp +459
jmp +1
acc +50
jmp +1
nop -25
jmp +464
acc +35
jmp -5
acc -14
jmp -113
nop +25
acc +33
acc +28
acc +3
jmp -71
nop +75
acc +19
acc +27
jmp +332
jmp +361
acc -2
acc +45
acc +47
jmp +461
jmp -120
acc +18
acc +25
acc +11
jmp +24
jmp +372
acc +32
acc +2
jmp +87
acc +23
jmp +96
acc +32
nop +233
acc -7
jmp +435
jmp +51
acc -7
jmp +392
acc +22
acc -17
acc +8
acc +34
jmp -140
acc +10
nop +276
jmp -57
acc -6
jmp +388
acc +4
jmp +386
jmp +267
jmp +1
acc +15
acc -11
nop -169
jmp +71
acc +10
acc +19
jmp +377
acc -1
jmp +316
acc +13
acc -5
acc +7
acc +28
jmp -49
acc +20
acc +4
acc -19
jmp +196
acc -1
acc -8
jmp +266
acc +43
acc +10
nop +122
jmp +222
acc +0
jmp +275
nop +282
jmp +199
acc +24
acc +37
acc -18
nop -33
jmp -110
acc -7
acc -9
acc +18
jmp -189
acc -10
acc +46
jmp +214
acc +22
acc +45
jmp +48
nop +217
acc -6
acc +5
jmp -40
jmp +220
acc +26
nop +393
jmp +1
jmp +358
jmp +138
nop -181
acc +48
jmp +190
acc +49
jmp +105
jmp -176
jmp +37
acc +49
jmp -130
acc +20
acc +48
jmp +236
acc +41
acc +19
nop +321
jmp -12
acc +3
acc +38
jmp +338
jmp -160
nop +250
acc +21
jmp +29
acc +44
acc +11
acc -17
acc +7
jmp +110
nop +242
acc +48
acc +46
jmp -15
acc -18
nop -190
acc +39
acc -12
jmp +255
acc -16
acc -13
acc +12
acc +29
jmp +243
jmp -14
acc +33
nop +40
acc -11
jmp +252
nop +248
acc -17
acc +14
jmp +29
acc -6
acc +21
acc +27
nop +287
jmp +329
acc -3
acc +7
acc +0
jmp +297
acc +9
jmp -10
acc +11
nop +293
acc -14
jmp +214
acc -11
acc +43
acc +43
acc +35
jmp +239
acc +10
acc -18
acc +39
jmp -129
acc +8
jmp +313
acc +49
jmp +300
nop +219
nop +215
jmp -203
acc -8
jmp +137
nop +211
acc -19
acc -18
nop -8
jmp +132
acc -17
jmp -84
acc +8
acc +2
acc -1
jmp -91
acc -4
acc +37
jmp +1
acc +14
jmp -297
acc -10
nop -186
acc -18
jmp -150
acc +46
acc +25
acc +45
acc -5
jmp +187
acc +21
jmp +101
acc +15
acc -15
jmp +30
acc +42
acc +35
jmp +276
jmp -323
jmp -124
acc +34
acc -16
acc -19
jmp -314
acc +45
jmp -219
acc +6
acc -12
acc +45
acc +38
jmp +30
acc +32
acc +47
acc +40
acc +11
jmp -236
acc +46
jmp -328
acc -18
acc +34
acc -11
jmp +201
acc +8
jmp +161
nop +44
acc +8
jmp +158
acc +26
jmp +137
acc +2
acc -4
nop -59
jmp +14
acc +18
jmp -211
acc +28
jmp -152
acc -3
acc +0
jmp -21
acc -2
jmp -331
acc +1
acc +24
nop -274
jmp -350
jmp +1
acc +28
acc -14
acc +49
jmp -39
nop +114
acc +33
jmp +217
acc +0
acc +25
jmp +1
acc +33
jmp +50
acc +23
acc +0
acc -14
jmp +66
jmp -68
jmp +1
acc +0
acc +10
jmp -244
jmp -200
jmp +1
acc -2
acc +34
jmp -48
nop +192
acc +34
acc -1
acc +6
jmp -48
acc +4
acc +13
jmp -405
acc +36
nop -372
acc +20
acc +32
jmp -231
acc +14
jmp -83
acc +22
jmp -375
acc +21
jmp -356
acc -1
jmp -398
jmp -104
acc +48
nop -382
jmp -296
acc -15
acc +29
jmp +159
acc +41
jmp -215
acc -6
acc -1
acc +44
acc -14
jmp +72
acc +2
acc +6
jmp -106
acc +39
jmp -301
acc -12
acc +43
acc +24
jmp -53
nop +19
acc +17
acc -12
jmp -211
jmp +1
jmp -98
acc +18
acc -6
nop -153
nop -376
jmp -377
nop +109
acc -10
acc +6
acc -13
jmp -359
acc +35
nop +125
jmp -312
jmp -23
acc +8
acc +27
nop +105
acc -16
jmp -112
acc -9
acc +13
acc +1
jmp -421
nop -471
acc +41
acc +10
acc +26
jmp -110
acc -8
acc -17
acc +32
acc -3
jmp -329
acc +0
acc +2
acc +2
jmp +114
acc +44
acc +7
acc -8
jmp +33
jmp -310
nop -14
acc +32
acc +21
acc +42
jmp -509
acc +4
jmp -29
nop +12
nop +74
jmp -491
jmp -307
acc +12
jmp -217
jmp -254
nop -3
acc +33
jmp +101
acc +17
jmp -4
nop -361
acc +20
acc +0
acc +37
jmp -120
jmp -178
jmp -306
acc +31
acc +16
acc +12
nop +61
jmp -466
acc +38
acc +40
jmp -323
acc -1
nop -112
nop +46
nop -221
jmp -111
jmp -248
acc -2
nop +53
acc -12
nop -382
jmp -514
jmp +1
acc +30
jmp -177
acc -18
acc +34
jmp -297
jmp -446
nop -33
acc +8
acc +19
acc +22
jmp +16
acc -17
nop -194
jmp -541
acc +50
acc +15
nop -347
acc -9
jmp -433
acc +32
nop -571
jmp -482
acc +42
nop -287
nop -263
jmp -368
jmp +10
acc +39
jmp -204
acc +28
acc +35
jmp -565
jmp -464
jmp -84
acc +25
jmp -532
acc +42
jmp +1
jmp -154
acc +4
acc +8
acc +4
acc +48
jmp -82
jmp -256
acc +33
acc +49
jmp +1
jmp -539
acc -1
acc +46
acc +49
acc +13
jmp -20
acc -11
acc -15
acc +1
jmp -96
jmp -483
jmp -444
jmp +1
jmp -382
acc -5
acc +5
acc +26
jmp -458
acc +24
jmp -515
nop -211
jmp -64
jmp -246
acc -17
acc -7
acc +0
acc +21
jmp +1';

// $source = 'nop +0
// acc +1
// jmp +4
// acc +3
// jmp -3
// acc -99
// acc +1
// jmp -4
// acc +6';

class Bootloader
{
	private static int $accumulator = 0;

	private static int $i = 0;

	/** @var int[] */
	private static array $historie = [];

	private static array $rows = [];

	public static function load(array $rows): void
	{
		self::$rows = $rows;
		for (self::$i = 0, $len = count($rows); self::$i < $len; ++self::$i) {
			self::parseElement($rows[self::$i], self::$i);
		}
	}

	private static function parseElement(string $element, int $id)
	{
		if (!preg_match('/(nop|acc|jmp) ([+-])(\d+)/', $element, $match)) {
			return;
		}

		self::add2Historie($id);

		$number = self::getInt($match[2], $match[3]);

		/**
		 * @used-by nop()
		 * @used-by jmp()
		 * @used-by acc()
		 */
		self::{$match[1]}($number);
	}

	private static function add2Historie(int $id)
	{
		self::$historie[$id] ??= 0;
		++self::$historie[$id];
		self::checkForInfinitiveLoop($id);
	}

	private static function checkForInfinitiveLoop(int $id)
	{
		if (self::$historie[$id] === 2) {
			throw new RuntimeException('Current acc-State: ' . self::$accumulator);
		}
	}

	private static function nop(): void {}

	private static function acc(int $number): void
	{
		self::$accumulator += $number;
	}

	private static function jmp(int $number): void
	{
		self::$i = (self::$i + $number) - 1;
	}

	private static function getInt(string $prefix, string $number): int
	{
		if ($prefix === '+') {
			return (int) $number;
		}

		return (int) $number * -1;
	}
}

$rows = explode("\n", $source);
Bootloader::load($rows);
