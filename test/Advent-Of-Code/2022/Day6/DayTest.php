<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day6;

use AdventOfCode\Y2022\Day6\BufferStreamReader;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(BufferStreamReader::class)]
class DayTest extends TestCase
{
	#[Test]
	public function findMarker(): void
	{
		$tests = [
			'mjqjpqmgbljsphdztnvjfqwrcgsmlb' => 7,
			'bvwbjplbgvbhsrlpgdmjqwftvncz' => 5,
			'nppdvjthqldpwncqszvftbrmjlhg' => 6,
			'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg' => 10,
			'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw' => 11,
		];

		foreach ($tests as $input => $expected) {
			$this->assertEquals($expected, BufferStreamReader::getMarkerPosition($input));
		}
	}

	#[Test]
	public function groupScoreTest(): void
	{
		$tests = [
			'mjqjpqmgbljsphdztnvjfqwrcgsmlb' => 19,
			'bvwbjplbgvbhsrlpgdmjqwftvncz' => 23,
			'nppdvjthqldpwncqszvftbrmjlhg' => 23,
			'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg' => 29,
			'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw' => 26,
		];

		foreach ($tests as $input => $expected) {
			$this->assertEquals($expected, BufferStreamReader::getMarkerPosition($input, 14));
		}
	}
}
