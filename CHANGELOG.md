# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased](https://gitlab.com/yukabuki/cron-expression-explainer/compare/2.0.0...v1.x)

## [2.0.1](https://gitlab.com/yukabuki/cron-expression-explainer/releases/tag/2.0.1) - 2026-02-23

### Fixed
- `fr` locale - Fixed translations for some expressions

## [2.0.0](https://gitlab.com/yukabuki/cron-expression-explainer/releases/tag/2.0.0) - 2026-02-23

### Added

- **French translation** (`fr` locale) - Complete French translation for all cron expressions
- **Automatic locale detection** - Locales are now automatically detected by scanning the translations directory
- **Custom translation support** - New `addTranslationPath()` method to add custom translation directories
- **Translation override capability** - Custom translations can override default translations
- **Dynamic locale validation** - `PartTranslator::hasLocale()` method to check if a locale is available
- Documentation: `CUSTOM_TRANSLATIONS.md` guide for custom translations
- Example: `examples/custom-translations.php` demonstrating custom translation usage

### Changed

- **BREAKING**: Namespace changed from `Orisai\CronExpressionExplainer` to `Yukabuki\CronExpressionExplainer`
- **BREAKING**: Package name changed from `orisai/cron-expression-explainer` to `yukabuki/cron-expression-explainer`
- `getSupportedLocales()` now scans the filesystem instead of returning a hardcoded array
- Improved locale validation to support both built-in and custom translations
- Updated all documentation to reflect new features and namespace changes

### Internal

- Added caching for scanned locales to improve performance
- `PartTranslator` now supports multiple translation paths with merge capability

## [1.1.1](https://github.com/orisai/cron-expression-explainer/compare/1.1.0...1.1.1) - 2024-06-20

### Changed

- Allow PHP 8.3
- Allow PHP 8.4

## [1.1.0](https://github.com/orisai/cron-expression-explainer/compare/1.0.0...1.1.0) - 2024-04-23

### Added

- `sk` locale

### Fixed

- `cs` locale - prefix in hour:minute format (e.g. `Ve 2:00` instead of `V 02:00`)

## [1.0.0](https://github.com/orisai/cron-expression-explainer/releases/tag/1.0.0) - 2024-04-22

Initial release
