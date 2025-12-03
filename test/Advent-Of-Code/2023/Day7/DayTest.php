<?php
declare(strict_types=1);

namespace Test\AdventOfCode\Y2023\Day7;

use AdventOfCode\Y2023\Day7\CardDeck;
use AdventOfCode\Y2023\Day7\Day;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Day::class)]
class DayTest extends TestCase
{
	private const string FILE = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
	private const string SAMPLE_FILE_PART_1 = __DIR__ . DIRECTORY_SEPARATOR . 'inputPart1Sample.txt';

	#[Test]
	public function sumBid(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(6440, $day->getSumBid());

		$day = new Day(self::FILE);
		$this->assertEquals(248453531, $day->getSumBid());
	}

	#[Test]
	public function sumBidWithJokers(): void
	{
		$day = new Day(self::SAMPLE_FILE_PART_1);
		$this->assertEquals(5905, $day->getSumBid(joker: true));

		$day = new Day(self::FILE);
		$this->assertEquals(248781813, $day->getSumBid(joker: true));
	}

	#[Test]
	public function compareTest(): void
	{
		$list = [
			CardDeck::findHighestPatternFrom(new CardDeck('JKKK2', 1)),
			new CardDeck('QQQQ2', 1),
		];

		usort($list, [CardDeck::class, 'compare']);

		$this->assertEquals('KKKK2', $list[0]->cardCode);
		$this->assertEquals('QQQQ2', $list[1]->cardCode);
	}
}
