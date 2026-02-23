<?php declare(strict_types = 1);

namespace Yukabuki\CronExpressionExplainer;

use DateTimeZone;
use Yukabuki\CronExpressionExplainer\Exception\UnsupportedExpression;
use Yukabuki\CronExpressionExplainer\Exception\UnsupportedLocale;

interface CronExpressionExplainer
{

	/**
	 * @param int<0,59>|null $repeatSeconds
	 * @throws UnsupportedExpression
	 * @throws UnsupportedLocale
	 */
	public function explain(
		string $expression,
		?int $repeatSeconds = null,
		?DateTimeZone $timeZone = null,
		?string $locale = null
	): string;

	/**
	 * @template T of string
	 * @param list<T> $locales
	 * @param int<0, 59>|null $repeatSeconds
	 * @return array<T, string>
	 */
	public function explainInLocales(
		array $locales,
		string $expression,
		?int $repeatSeconds = null,
		?DateTimeZone $timeZone = null
	): array;

	/**
	 * @return array<string, string>
	 */
	public function getSupportedLocales(): array;

}
