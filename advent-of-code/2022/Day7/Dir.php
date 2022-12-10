<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day7;

class Dir
{
	public string $name = '';

	public ?Dir $parent = null;

	/** @var File[] */
	public array $files = [];

	/** @var Dir[] */
	public array $folders = [];

	public function getSize(): int {
		$size = 0;
		foreach($this->files as $item){
			$size += $item->size;
		}

		foreach($this->folders as $folder){
			$size += $folder->getSize();
		}

		return $size;
	}

	public function walkFiles():\Generator {
		foreach($this->files as $file){
			yield $file;
		}

		foreach($this->folders as $folder){
			yield from $folder->walkFiles();
		}
	}

	public function walkFolder():\Generator {
		yield $this;
		foreach($this->folders as $folder){
			yield from $folder->walkFolder();
		}
	}
}