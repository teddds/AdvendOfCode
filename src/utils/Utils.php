<?php
declare(strict_types=1);

class Utils
{
	public static function readFile(string $path): Generator
	{
		if (!is_file($path)) {
			yield $path;

			return;
		}

		$file = fopen($path, 'rb');
		while (($line = fgets($file)) !== false) {
			yield trim($line);
		}
		fclose($file);
	}
}
