<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day3;
include "../../../vendor/autoload.php";

$file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
echo (new CampCleanerReader($file))->getCountFullyContaindAssigmentPairs(true);