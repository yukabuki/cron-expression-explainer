<h1 align="center">
	Cron Expression Explainer
</h1>

<p align="center">
    Human-readable cron expressions (custom translations support)
</p>

<p align="center">
	📄 Check out our <a href="docs/README.md">documentation</a>.
</p>

<p align="center">
	🎨 <a href="CUSTOM_TRANSLATIONS.md">Custom Translations Guide</a> - Learn how to add your own translations!
</p>

<p align="center">
	🔗 Original project by <a href="https://github.com/orisai/cron-expression-explainer">Orisai</a>
</p>

<p align="center">
	<a href="https://choosealicense.com/licenses/mpl-2.0/"><img src="https://badgen.net/badge/license/MPL-2.0/blue?cache=3600"></a>
<p>

##

```php
use Yukabuki\CronExpressionExplainer\DefaultCronExpressionExplainer;

$explainer = new DefaultCronExpressionExplainer();

$explainer->explain('* * * * *'); // At every minute.
$explainer->explain('*/30 * * * *'); // At every 30th minute.
$explainer->explain('@daily'); // At 00:00.
$explainer->explain('* * 1 * 1'); // At every minute on day-of-month 1 and on every Monday.
$explainer->explain('0 22 * 12 *'); // At 22:00 in December.
$explainer->explain('0 8-18 * * *'); // At minute 0 past every hour from 8 through 18.
$explainer->explain('0 8-18/2 * * *'); // At minute 0 past every 2nd hour from 8 through 18.
$explainer->explain('0 8,12,16 * * *'); // At minute 0 past hour 8, 12 and 16.
$explainer->explain('* * 1 2 *'); // At every minute on 1st of February.
$explainer->explain('* * * * SUN#2'); // At every minute on 2nd Sunday.
$explainer->explain('* * 15W * *'); // At every minute on a weekday closest to the 15th.
$explainer->explain('* * L * *'); // At every minute on a last day-of-month.
$explainer->explain('* * LW * *'); // At every minute on a last weekday.
$explainer->explain('* * * * 7L'); // At every minute on the last Sunday.
```

## ✨ New Features in This Fork

### 🔍 Automatic Locale Detection
Locales are automatically detected by scanning the translations directory - no hardcoded lists!

```php
$locales = $explainer->getSupportedLocales();
// Automatically finds: cs, en, fr, sk
```

### 📁 Custom Translation Support
Add your own translations or override existing ones:

```php
// Add a directory with custom translations
$explainer->addTranslationPath('/path/to/custom/translations');

// Use your custom locale
$explainer->explain('* * * * *', null, null, 'es'); // Spanish
$explainer->explain('* * * * *', null, null, 'de'); // German
```

See [CUSTOM_TRANSLATIONS.md](CUSTOM_TRANSLATIONS.md) for detailed guide and examples.
```
