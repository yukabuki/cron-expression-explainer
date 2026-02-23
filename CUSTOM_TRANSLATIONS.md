# Custom Translations Guide

This fork adds powerful features for managing translations dynamically.

## Features

### 🔍 Automatic Locale Detection

Locales are now automatically detected by scanning the `src/Translator/translations/` directory. No need to manually update a hardcoded list!

```php
$explainer = new DefaultCronExpressionExplainer();
$locales = $explainer->getSupportedLocales();
// Returns: ['cs' => 'czech', 'en' => 'english', 'fr' => 'french', 'sk' => 'slovak']
```

### 📁 Custom Translation Directories

Add your own translation directories to extend or override translations:

```php
$explainer = new DefaultCronExpressionExplainer();

// Add a custom translation directory
$explainer->addTranslationPath('/path/to/my/translations');

// Now you can use any locale from that directory
$explainer->explain('* * * * *', null, null, 'es');
$explainer->explain('* * * * *', null, null, 'de');
```

### 🔄 Override Existing Translations

You can override specific translation keys without replacing the entire translation file:

```php
// Create a custom translation file: /custom/fr.php
<?php
return [
    'every-minute' => 'toutes les minutes', // Override just this key
];

// Add the custom path
$explainer->addTranslationPath('/custom');

// The French translation will use your custom key for 'every-minute'
// and fall back to default translations for other keys
```

## Creating a Custom Translation

### Step 1: Create a Translation File

Create a PHP file named with the locale code (e.g., `es.php` for Spanish):

```php
<?php declare(strict_types = 1);

return [
    'listSeparator' => ', ',
    'list' => '{values} y {lastValue}',
    'step-all-minute' => 'cada {step} minutos',
    'step-all-hour' => 'cada {step} horas',
    // ... see src/Translator/translations/en.php for all keys
];
```

### Step 2: Add the Translation Directory

```php
$explainer = new DefaultCronExpressionExplainer();
$explainer->addTranslationPath('/path/to/directory/containing/es.php');
```

### Step 3: Use Your Translation

```php
echo $explainer->explain('*/30 * * * *', null, null, 'es');
// Output: Cada 30 minutos.
```

## Translation File Structure

All translation files must return an array with the following keys. See `src/Translator/translations/en.php` for a complete reference:

- `listSeparator` - Separator for lists
- `list` - Format for lists
- `step-all-*` - Step expressions (every Nth)
- `range-*` - Range expressions (from X to Y)
- `second` - Second expressions
- `every-minute` - Every minute
- `minute`, `hour`, `day-of-week`, `day-of-month`, `month` - Time unit translations
- `before-*` - Prepositions and connectors
- `hour+minute` - Combined hour and minute format
- `day-of-month+month` - Combined day and month format
- `timezone` - Timezone format

## Examples

See `examples/custom-translations.php` for a complete working example.

## Benefits

1. **No code changes needed** - Just drop translation files in a directory
2. **Easy maintenance** - Override only what you need
3. **Multiple sources** - Combine translations from different directories
4. **Dynamic** - Add translations at runtime without rebuilding
5. **Backward compatible** - Existing code continues to work

## Migration from Original Package

If you're migrating from the original `orisai/cron-expression-explainer`:

1. All existing functionality works the same
2. `getSupportedLocales()` now scans the filesystem instead of returning a hardcoded array
3. New method `addTranslationPath()` is available for custom translations
4. No breaking changes!
