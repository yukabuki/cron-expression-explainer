<?php declare(strict_types = 1);

namespace Tests\Yukabuki\CronExpressionExplainer\Unit\Part;

use Yukabuki\CronExpressionExplainer\Part\RangePart;
use Yukabuki\CronExpressionExplainer\Part\StepPart;
use Yukabuki\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class StepPartTest extends TestCase
{

	public function test(): void
	{
		$range = new RangePart(new ValuePart('10'), new ValuePart('20'));
		$step = 2;
		$part = new StepPart($range, $step);

		self::assertSame('step', $part->getName());
		self::assertSame($range, $part->getRange());
		self::assertSame($step, $part->getStep());
	}

}
