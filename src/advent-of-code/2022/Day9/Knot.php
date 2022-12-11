<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day9;
class Knot
{
	public ?Knot $next = null;
	public array $grid = [];

	public function __construct(protected BridgeGridOperator $operator)
	{
		$this->grid[$this->y][$this->x] = 1;
	}

	public function getLastKnot(): Knot {
		if($this->next){
			return $this->next->getLastKnot();
		}

		return $this;
	}

	public function getKnots(): \Generator {
		yield $this;

		if($this->next){
			yield from $this->next->getKnots();
		}
	}

	public string $name = 'Head';
	public int $x = 0;
	public int $y = 0;

	private int $prevX = 0;
	private int $prevY = 0;

	public static function getDistance(self $a, self $b): int {
		$dx = $a->x - $b->x;
		$dy = $a->y - $b->y;

		return (int) (abs(($dx ** 2) + ($dy ** 2))) ** .5;
	}

	public function moveTo(int $x, int $y){
		$this->prevY = $this->y;
		$this->prevX = $this->x;
		$this->x = $x;
		$this->y = $y;
		$this->add2Grid();
		$this->moveNextKnot();
	}

	public function moveOneUp(): void {
		$this->moveTo($this->x, $this->y - 1);
	}

	public function moveOneDown(): void {
		$this->moveTo($this->x, $this->y + 1);
	}

	public function moveOneLeft(): void {
		$this->moveTo($this->x - 1, $this->y);
	}
	public function moveOneRight(): void {
		$this->moveTo($this->x + 1, $this->y);
	}

	public function add2Grid(): void {
		$this->grid[$this->y][$this->x] = 1;
	}

	private function moveNextKnot(): void {

		if(!$this->next){
			return;
		}

		if(self::getDistance($this->next, $this) > 1){
			$this->next->moveTo( $this->prevX,  $this->prevY);
		}
	}
}