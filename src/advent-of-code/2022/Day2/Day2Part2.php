<?php
declare(strict_types=1);
namespace AdventOfCode\Y2022\Day2;
include "../../../vendor/autoload.php";

$file = __DIR__ . DIRECTORY_SEPARATOR . 'input.txt';
echo (new TournamentReader($file))->getScore(true);