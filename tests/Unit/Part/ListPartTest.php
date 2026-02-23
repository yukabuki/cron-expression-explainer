<?php declare(strict_types = 1);

namespace Tests\Yukabuki\CronExpressionExplainer\Unit\Part;

use Yukabuki\CronExpressionExplainer\Part\ListPart;
use Yukabuki\CronExpressionExplainer\Part\RangePart;
use Yukabuki\CronExpressionExplainer\Part\StepPart;
use Yukabuki\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class ListPartTest extends TestCase
{

	public function test(): void
	{
		$parts = [
			new StepPart(new RangePart(new ValuePart('10'), new ValuePart('20')), 2),
			new RangePart(new ValuePart('30'), new ValuePart('40')),
			new ValuePart('50'),
		];
		$part = new ListPart($parts);

		self::assertSame('list', $part->getName());
		self::assertSame($parts, $part->getParts());
	}

}
