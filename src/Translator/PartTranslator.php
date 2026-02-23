<?php declare(strict_types = 1);

namespace Yukabuki\CronExpressionExplainer\Translator;

use MessageFormatter;
use function array_merge;
use function assert;
use function file_exists;
use function is_file;

/**
 * @internal
 */
final class PartTranslator
{

	/** @var array<string, array<mixed>> */
	private array $translations = [];

	/** @var list<string> */
	private array $customTranslationPaths = [];

	/**
	 * Add a custom translation directory path
	 * Translations in custom paths override default translations
	 *
	 * @param string $path Absolute path to the directory containing translation files
	 */
	public function addTranslationPath(string $path): void
	{
		$this->customTranslationPaths[] = $path;
		// Clear cache to reload translations with new path
		$this->translations = [];
	}

	/**
	 * @param array<string, string|int> $parameters
	 */
	public function translate(string $key, array $parameters, string $locale): string
	{
		$message = $this->loadTranslations($locale)[$key];
		if ($message === '') {
			return '';
		}

		$formatter = new MessageFormatter($locale, $message);
		$translatedMessage = $formatter->format($parameters);
		assert($translatedMessage !== false);

		return $translatedMessage;
	}

	/**
	 * Check if a locale has translations available
	 */
	public function hasLocale(string $locale): bool
	{
		// Check default translations directory
		if (file_exists($this->getDefaultTranslationFile($locale))) {
			return true;
		}

		// Check custom translation paths
		foreach ($this->customTranslationPaths as $path) {
			if (file_exists($path . '/' . $locale . '.php')) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @return array<mixed>
	 */
	private function loadTranslations(string $locale): array
	{
		$translations = $this->translations[$locale] ?? null;

		if ($translations !== null) {
			return $translations;
		}

		// Start with default translations if they exist
		$defaultFile = $this->getDefaultTranslationFile($locale);
		$mergedTranslations = [];

		if (file_exists($defaultFile) && is_file($defaultFile)) {
			$mergedTranslations = require $defaultFile;
		}

		// Merge custom translations (they override defaults)
		foreach ($this->customTranslationPaths as $path) {
			$customFile = $path . '/' . $locale . '.php';
			if (file_exists($customFile) && is_file($customFile)) {
				$customTranslations = require $customFile;
				$mergedTranslations = array_merge($mergedTranslations, $customTranslations);
			}
		}

		return $this->translations[$locale] = $mergedTranslations;
	}

	private function getDefaultTranslationFile(string $locale): string
	{
		return __DIR__ . '/translations/' . $locale . '.php';
	}

}
