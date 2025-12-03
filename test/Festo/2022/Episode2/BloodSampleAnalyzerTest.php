<?php
declare(strict_types=1);

namespace Test\Festo\Y2022\Episode2;

use Festo\Y2022\Episode2\PopulationAnalyzer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(PopulationAnalyzer::class)]
class BloodSampleAnalyzerTest extends TestCase
{
	private const string CLEAN = __DIR__ . DIRECTORY_SEPARATOR . 'lab_blood_clean.txt';
	private const string PICO_GEN_1 = __DIR__ . DIRECTORY_SEPARATOR . 'lab_blood_gen1.txt';

	#[Test]
	public function findOnlyNegativeEntries(): void
	{
		$bsa = new PopulationAnalyzer(self::CLEAN);
		foreach ($bsa->getPerson() as $bs) {
			self::assertFalse($bs->bloodSample?->hasPico());
		}
	}

	#[Test]
	public function findOnlyPositiveEntries(): void
	{
		$bsa = new PopulationAnalyzer(self::PICO_GEN_1);
		foreach ($bsa->getPerson() as $bs) {
			self::assertTrue($bs->bloodSample?->hasPico());
		}
	}
}
