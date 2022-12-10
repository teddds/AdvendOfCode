<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day6;
class BufferStreamReader
{

	public static function getMarkerPosition(string $input, int $markerLength = 4): int
	{
		foreach(\Utils::readFile($input) as $line){
			$offset = 0;
			$a = str_split($line);
			$len = count($a);
			do{
				if($offset+$markerLength > $len){
					break;
				}
				$tmp = array_unique(array_slice($a, $offset, $markerLength));
				if(count($tmp) === $markerLength){
					return $offset + $markerLength;
				}
				$offset++;
			}while(true);
		}

		return -1;
	}

}