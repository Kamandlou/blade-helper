<?php

namespace Kamandlou\BladeHelper;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class BladeHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerBladeHelpers();
    }

    protected function registerBladeHelpers(): void
    {
        Blade::directive('uppercase', function (string $string) {
            return "<?php echo htmlspecialchars(strtoupper($string)); ?>";
        });
        Blade::directive('lowercase', function (string $string) {
            return "<?php echo htmlspecialchars(strtolower($string)); ?>";
        });
        Blade::directive('capitalize', function (string $string) {
            return "<?php echo htmlspecialchars(ucfirst($string)); ?>";
        });
        Blade::directive('titlecase', function (string $string) {
            return "<?php echo htmlspecialchars(ucwords($string)); ?>";
        });
        Blade::directive('trim', function (string $string) {
            return "<?php echo htmlspecialchars(trim($string)); ?>";
        });
        Blade::directive('ltrim', function (string $string) {
            return "<?php echo htmlspecialchars(ltrim($string)); ?>";
        });
        Blade::directive('rtrim', function (string $string) {
            return "<?php echo htmlspecialchars(rtrim($string)); ?>";
        });
        Blade::directive('slug', function (string $string) {
            return htmlspecialchars(trim(implode('-', explode(' ', $string)), "'"));
        });
        Blade::directive('implode', function (array $items, string $seperator) {
            return "<?php echo htmlspecialchars(implode($seperator, $items)); ?>";
        });
        Blade::directive('logError', function (string $message) {
            return "<?php Log::error($message); ?>";
        });
        Blade::directive('logInfo', function (string $message) {
            return "<?php Log::info($message); ?>";
        });
        Blade::directive('logDebug', function (string $message) {
            return "<?php Log::debug($message); ?>";
        });
        Blade::directive('logWarning', function (string $message) {
            return "<?php Log::warning($message); ?>";
        });
        Blade::directive('logAlert', function (string $message) {
            return "<?php Log::alert($message); ?>";
        });
        Blade::if('equal', function ($a, $b): bool {
            return $a === $b;
        });
    }
}