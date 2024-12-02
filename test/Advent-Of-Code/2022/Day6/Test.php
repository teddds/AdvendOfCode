<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2022\Day6;

use AdventOfCode\Y2022\Day6\BufferStreamReader;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
	/**
	 * @test
	 */
	public function findMarkerTest(): void
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

	/**
	 * @test
	 */
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
