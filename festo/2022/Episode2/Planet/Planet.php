<?php declare(strict_types=1);

namespace Festo\Y2022\Episode2;

class Planet {

	public string $name;
	public int $x;
	public int $y;
	public int $z;

	private const MEDIAN_DISTANCE_NORMAL = 2;
	private const MEDIAN_DISTANCE_OUTLIER = 10;

	public function isOutlierPlanet(self $median): bool {
		return
			//abs($this->x - $median->x) > self::MEDIAN_DISTANCE_OUTLIER
			abs($this->y - $median->y) > self::MEDIAN_DISTANCE_OUTLIER
			//abs($this->z - $median->z) > self::MEDIAN_DISTANCE_OUTLIER
		;
	}

	public static function fromName(string $name): ?self {
		return (new PlanetAnalyzer())->getPlanetByName($name);
	}

}