<?php declare(strict_types = 1);

/**
 * Example: Using custom translation directories
 *
 * This example shows how to:
 * 1. Use the automatic locale scanning feature
 * 2. Add custom translation directories
 * 3. Override existing translations
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Yukabuki\CronExpressionExplainer\DefaultCronExpressionExplainer;

$explainer = new DefaultCronExpressionExplainer();

// ============================================
// 1. Automatic locale detection
// ============================================
echo "=== Available locales (auto-detected) ===\n";
$locales = $explainer->getSupportedLocales();
foreach ($locales as $code => $name) {
    echo "- {$code}: {$name}\n";
}
echo "\n";

// ============================================
// 2. Using default translations
// ============================================
echo "=== Using default translations ===\n";
echo "English: " . $explainer->explain('*/30 * * * *', null, null, 'en') . "\n";
echo "French:  " . $explainer->explain('*/30 * * * *', null, null, 'fr') . "\n";
echo "Czech:   " . $explainer->explain('*/30 * * * *', null, null, 'cs') . "\n";
echo "\n";

// ============================================
// 3. Adding custom translations
// ============================================
echo "=== Adding custom translation directory ===\n";

// Create a custom translation directory (example)
$customTranslationPath = __DIR__ . '/custom-translations';
if (!is_dir($customTranslationPath)) {
    mkdir($customTranslationPath, 0755, true);
}

// Create a custom Spanish translation file
$spanishTranslation = <<<'PHP'
<?php declare(strict_types = 1);

return [
    'listSeparator' => ', ',
    'list' => '{values} y {lastValue}',
    'step-all-minute' => 'cada {step} minutos',
    'step-all-hour' => 'cada {step} horas',
    'step-all-day-of-week' => 'cada {step} días de la semana',
    'step-all-day-of-month' => 'cada {step} días del mes',
    'step-all-month' => 'cada {step} meses',
    'step-minute' => 'cada {step} minutos {part}',
    'step-hour' => 'cada {step} horas {part}',
    'step-day-of-week' => 'cada {step} días de la semana {part}',
    'step-day-of-month' => 'cada {step} días del mes {part}',
    'step-month' => 'cada {step} meses {part}',
    'range-minute' => 'de {left} a {right}',
    'range-minute-named' => 'cada minuto de {left} a {right}',
    'range-hour' => 'de {left} a {right}',
    'range-hour-named' => 'cada hora de {left} a {right}',
    'range-day-of-week' => 'de {left} a {right}',
    'range-day-of-week-named' => 'cada día de la semana de {left} a {right}',
    'range-day-of-month' => 'de {left} a {right}',
    'range-day-of-month-named' => 'cada día del mes de {left} a {right}',
    'range-month' => 'de {left} a {right}',
    'range-month-named' => 'cada mes de {left} a {right}',
    'second' => '{second, plural,
      one {cada segundo}
      other {cada # segundos}
    }',
    'every-minute' => 'cada minuto',
    'before-minute' => 'a las ',
    'minute' => '{minute}',
    'minute-named' => 'minuto {minute}',
    'before-hour' => ' pasadas ',
    'hour' => '{hour}',
    'hour-named' => 'hora {hour}',
    'between-day-of-month-and-week' => ' y',
    'before-day-of-week' => ' el ',
    'day-of-week' => '{dayNumber, select,
      1 {lunes}
      2 {martes}
      3 {miércoles}
      4 {jueves}
      5 {viernes}
      6 {sábado}
      7 {domingo}
      other {{dayNumber} - desconocido}
    }',
    'day-of-week-nth' => '{nth, selectordinal,
      one {#er}
      other {#º}
    } {day}',
    'day-of-week-last' => 'el último {day}',
    'before-day-of-month' => ' el ',
    'day-of-month' => '{day}',
    'day-of-month-named' => 'día del mes {day}',
    'day-of-month-last-day' => 'el último día del mes',
    'day-of-month-last-weekday' => 'el último día laborable',
    'day-of-month-nearest-weekday' => 'el día laborable más cercano al {day, selectordinal,
      one {#er}
      other {#º}
    }',
    'before-month' => ' en ',
    'month' => '{month, select,
      1 {enero}
      2 {febrero}
      3 {marzo}
      4 {abril}
      5 {mayo}
      6 {junio}
      7 {julio}
      8 {agosto}
      9 {septiembre}
      10 {octubre}
      11 {noviembre}
      12 {diciembre}
      other {{month} - desconocido}
    }',
    'hour+minute' => 'a las {hour}:{minute}',
    'day-of-month+month' => 'el {day, selectordinal,
      one {#er}
      other {#}
    } de {month, select,
      1 {enero}
      2 {febrero}
      3 {marzo}
      4 {abril}
      5 {mayo}
      6 {junio}
      7 {julio}
      8 {agosto}
      9 {septiembre}
      10 {octubre}
      11 {noviembre}
      12 {diciembre}
      other {{month} - desconocido}
    }',
    'timezone' => 'en la zona horaria {tz}',
];
PHP;

file_put_contents($customTranslationPath . '/es.php', $spanishTranslation);

// Add the custom translation path
$explainer->addTranslationPath($customTranslationPath);

echo "Custom translation path added: {$customTranslationPath}\n";
echo "Spanish: " . $explainer->explain('*/30 * * * *', null, null, 'es') . "\n";
echo "\n";

// ============================================
// 4. Overriding existing translations
// ============================================
echo "=== Overriding existing translations ===\n";

// Create a custom French override (more casual tone)
$frenchOverride = <<<'PHP'
<?php declare(strict_types = 1);

return [
    'every-minute' => 'toutes les minutes',
    'step-all-minute' => 'toutes les {step} min',
];
PHP;

file_put_contents($customTranslationPath . '/fr.php', $frenchOverride);

// Recreate explainer to reload translations
$explainer2 = new DefaultCronExpressionExplainer();
$explainer2->addTranslationPath($customTranslationPath);

echo "Original French: " . $explainer->explain('* * * * *', null, null, 'fr') . "\n";
echo "Custom French:   " . $explainer2->explain('* * * * *', null, null, 'fr') . "\n";
echo "\n";

echo "=== Cleanup ===\n";
// Cleanup example files
unlink($customTranslationPath . '/es.php');
unlink($customTranslationPath . '/fr.php');
rmdir($customTranslationPath);
echo "Custom translation files removed.\n";
