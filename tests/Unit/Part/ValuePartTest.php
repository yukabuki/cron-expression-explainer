<?php declare(strict_types = 1);

namespace Tests\Yukabuki\CronExpressionExplainer\Unit\Part;

use Yukabuki\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class ValuePartTest extends TestCase
{

	public function test(): void
	{
		$value = '*';
		$part = new ValuePart($value);

		self::assertSame('value', $part->getName());
		self::assertSame($value, $part->getValue());
	}

}
