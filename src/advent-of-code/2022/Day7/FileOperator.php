<?php
declare(strict_types=1);

namespace AdventOfCode\Y2022\Day7;

use Utils;

class FileOperator
{
	private const TOTAL = 70000000;

	private const INPUT = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';

	private Dir $structure;

	public function __construct(private ?string $path = null)
	{
		$this->path ??= self::INPUT;
		$this->structure = new Dir();
		$this->structure->name = $this->path;
		$this->readStructure();
	}

	public function getTotalSizeOfDeleteDirectorysWhichProducedEnoughtFreeSpace(int $free = 30000000): int
	{
		$totalSize = self::TOTAL;
		$currentFree = self::TOTAL - $this->getTotalAmount();
		$toDelete = $free - $currentFree;
		foreach ($this->structure->walkFolder() as $folder) {
			if (($folderSize = $folder->getSize()) > $toDelete) {
				$totalSize = min($folderSize, $totalSize);
			}
		}

		return $totalSize;
	}

	public function getTotalSizeOfAllDirectorysLessThan(int $size = 100000): int
	{
		$totalSize = 0;
		foreach ($this->structure->walkFolder() as $folder) {
			if (($folderSize = $folder->getSize()) < $size) {
				$totalSize += $folderSize;
			}
		}

		return $totalSize;
	}

	private function getTotalAmount(): int
	{
		$total = 0;
		foreach ($this->structure->walkFiles() as $file) {
			$total += $file->size;
		}

		return $total;
	}

	private function readStructure(): void
	{
		$currentDir = $this->structure;
		$prevDir = $this->structure;
		foreach (Utils::readFile($this->path) as $row) {
			$row = trim($row);

			if (preg_match('/^\$\s+cd\s+(.+)/', $row, $match)) {
				switch ($match[1]) {
					case '..':
						// one level up
						$currentDir = $currentDir->parent ?? $this->structure;
						break;
					case '/':
						// head
						$currentDir = $this->structure;
						break;
					default:
						// open new Dirctory
						$d = new Dir();
						$d->name = $match[1];
						$d->parent = $currentDir;
						$currentDir->folders[] = $d;
						$currentDir = $d;
				}
			} elseif (preg_match('/(\d+)\s+(.+)/', $row, $match)) {
				// File
				$f = new File();
				$f->name = $match[2];
				$f->size = (int) $match[1];
				$currentDir->files[] = $f;
			}
		}
	}
}
