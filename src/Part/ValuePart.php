<?php declare(strict_types = 1);

namespace Yukabuki\CronExpressionExplainer\Part;

final class ValuePart implements Part
{

	private string $value;

	public function __construct(string $value)
	{
		$this->value = $value;
	}

	public function getName(): string
	{
		return 'value';
	}

	public function getValue(): string
	{
		return $this->value;
	}

}
