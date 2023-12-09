<?php
declare(strict_types=1);

namespace AdventOfCode\Y2023\Day8;

use LogicException;
use Utils;

final class Day
{
	private const START = 'AAA';
	private const END = 'ZZZ';
	private ?Instruction $instruction = null;

	/** @var array<string, Node> */
	private array $nodeList = [];

	public function __construct(private readonly string $inputPath) {}

	public function getStepCount(): int
	{
		$this->readInput();

		return $this->getSteps($this->nodeList[self::START]);
	}

	public function getStepCountLeastCommonMultiple(): int
	{
		$this->readInput();
		$startNodes = array_filter($this->nodeList, static fn (Node $node) => str_ends_with($node->name, 'A'));

		$commonMultiply = [];
		foreach ($startNodes as $node) {
			$commonMultiply[] = $this->getSteps($node);
		}

		return self::getLcmOfNumbers($commonMultiply);
	}

	private static function getGCD(int $a, int $b): int
	{
		if ($b === 0) {
			return $a;
		}

		return self::getGCD($b, $a % $b);
	}

	private static function getLcmOfNumbers(array $numbers): int
	{
		$ans = $numbers[0];
		for ($i = 1, $iMax = count($numbers); $i < $iMax; ++$i) {
			$ans = (($numbers[$i] * $ans) / self::getGCD($numbers[$i], $ans));
		}

		return $ans;
	}

	private function getSteps(Node $current): int
	{
		$i = 0;
		foreach ($this->instruction->getNextInstruction() as $key) {
			$nextIndex = $current->getByInstruction($key);
			if (!isset($this->nodeList[$nextIndex])) {
				throw new LogicException('inconsistency data');
			}
			$current = $this->nodeList[$nextIndex];
			++$i;
			if ($current->isEndNode) {
				break;
			}
		}

		return $i;
	}

	private function readInput(): void
	{
		$first = true;
		foreach (Utils::readFile($this->inputPath) as $line) {
			if ($first) {
				$this->instruction = new Instruction($line);
				$first = false;
			} elseif (preg_match('/(\w{3}) = \((\w{3}), (\w{3})\)/', $line, $match)) {
				$this->nodeList[$match[1]] = new Node($match[1], $match[2], $match[3]);
			}
		}
	}
}
