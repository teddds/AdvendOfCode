<?php declare(strict_types=1);


namespace Festo\Y2022\Episode2;


class Person {

	public string $name = '';
	public ?int $id = null;
	public ?BloodSample $bloodSample = null;
	public Planet|string $planet = '';
}