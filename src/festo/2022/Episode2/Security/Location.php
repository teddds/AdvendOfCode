<?php
declare(strict_types=1);

namespace Festo\Y2022\Episode2;

class Location
{
	public string $name;

	/** @var Log[] */
	public array $log = [];
}
