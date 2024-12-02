<?php
declare(strict_types=1);

namespace Test\Festo\Y2022\Episode2;

use Festo\Y2022\Episode2\PopulationAnalyzer;
use PHPUnit\Framework\TestCase;

class BloodSampleAnalyzerTest extends TestCase
{
	private const CLEAN = __DIR__ . DIRECTORY_SEPARATOR . 'lab_blood_clean.txt';
	private const PICO_GEN_1 = __DIR__ . DIRECTORY_SEPARATOR . 'lab_blood_gen1.txt';

	/**
	 * @test
	 */
	public function findOnlyNegativeEntries()
	{
		$bsa = new PopulationAnalyzer(self::CLEAN);
		foreach ($bsa->getPerson() as $bs) {
			self::assertEquals(false, $bs->bloodSample?->hasPico());
		}
	}

	/**
	 * @test
	 */
	public function findOnlyPositiveEntries()
	{
		$bsa = new PopulationAnalyzer(self::PICO_GEN_1);
		foreach ($bsa->getPerson() as $bs) {
			self::assertEquals(true, $bs->bloodSample?->hasPico());
		}
	}
}
