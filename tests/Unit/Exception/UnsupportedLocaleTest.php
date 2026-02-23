<?php declare(strict_types = 1);

namespace Tests\Yukabuki\CronExpressionExplainer\Unit\Exception;

use Yukabuki\CronExpressionExplainer\Exception\UnsupportedLocale;
use PHPUnit\Framework\TestCase;

final class UnsupportedLocaleTest extends TestCase
{

	public function test(): void
	{
		$exception = new UnsupportedLocale('en');

		self::assertSame("Locale 'en' is not supported.", $exception->getMessage());
		self::assertSame('en', $exception->getLocale());
	}

}
