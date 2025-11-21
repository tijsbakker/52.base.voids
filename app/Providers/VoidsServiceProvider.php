<?php

namespace Modules\Voids\Providers;

use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class VoidsServiceProvider extends ServiceProvider
{
    protected string $name = 'Voids';

    protected string $nameLower = 'voids';

    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
    }

    public function register(): void
    {
    }

    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom($this->module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom($this->module_path($this->name, 'lang'));
        }
    }

    protected function registerConfig(): void
    {
        $configDirectory = config('modules.paths.generator.config.path', 'config');
        $configPath = $this->module_path($this->name, $configDirectory);

        if (is_dir($configPath)) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $config = str_replace($configPath.DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $config_key = str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $config);
                    $segments = explode('.', $this->nameLower.'.'.$config_key);

                    // Remove duplicated adjacent segments
                    $normalized = [];
                    foreach ($segments as $segment) {
                        if (end($normalized) !== $segment) {
                            $normalized[] = $segment;
                        }
                    }

                    $key = ($config === 'config.php') ? $this->nameLower : implode('.', $normalized);

                    $this->publishes([$file->getPathname() => config_path($config)], 'config');
                    $this->merge_config_from($file->getPathname(), $key);
                }
            }
        }
    }

    protected function merge_config_from(string $path, string $key): void
    {
        $existing = config($key, []);
        $module_config = require $path;

        config([$key => array_replace_recursive($existing, $module_config)]);
    }

    protected function module_path(string $name, string $path = ''): string
    {
        $module = app('modules')->find($name);

        return $module->getPath().($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}