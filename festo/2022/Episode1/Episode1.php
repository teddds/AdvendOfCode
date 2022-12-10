<?php
declare(strict_types=1);

namespace Festo\Y2022\Episode1;

class Episode1
{
	private const INPUT = 'office_database.txt';

	private array $content;

	public function __construct()
	{
		$handle = fopen(self::INPUT, 'r');
		$result = [];
		$keys = ['name', 'id', 'acceskey', 'time'];
		if ($handle) {
			while (($line = fgetcsv($handle)) !== false) {
				if(is_array($line)){
					$line = array_map(fn($item) => trim($item), $line);
					$line[2] = str_pad(decbin((int) $line[2]), 8, "0", STR_PAD_LEFT);
					$line[3] = DateTime::createFromFormat('H:i', $line[3]);
					$result[] = array_combine($keys, $line);
				}
			}
			fclose($handle);
		}

		$this->content = $result;
	}

	public function filterId(int $id): int
	{
		$this->content = array_filter( $this->content, fn($item) => str_contains($item['id'], (string) $id));
		return array_sum(array_map(fn($item) => $item['id'], $this->content));
	}

	public function filterAccesKey(int $key): int
	{
		$this->content = array_filter( $this->content, fn($item) => $item['acceskey'][$key] === '1');
		return array_sum(array_map(fn($item) => $item['id'], $this->content));
	}


	public function filterTime(string $time): int
	{
		$cmp = \DateTime::createFromFormat('H:i', $time);
		$this->content = array_filter( $this->content, fn($item) => $cmp > $item['time']);
		return array_sum(array_map(fn($item) => $item['id'], $this->content));
	}
}

$day = new Episode1();
echo 'sum: ' . $day->filterId(814) . "\n";
echo 'sum: ' . $day->filterAccesKey(4) . "\n";
echo 'sum: ' . $day->filterTime('07:14') . "\n";

$content = 'fsdf';
//echo 'total Calories of Top 3 Elfs with most Calories: ' . $day->getSumOfTopThreeElfWithMostCalories(). "\n";;
