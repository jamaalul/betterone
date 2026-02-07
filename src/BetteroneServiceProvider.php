<?php

namespace Betterone\Betterone;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Betterone\Betterone\Compilers\BetterBladeCompiler;

class BetteroneServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/betterone.php',
            'betterone'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'better');

        // Register component namespace for <x-better::*> syntax
        Blade::componentNamespace('Betterone\\Betterone\\Components', 'better');

        // Extend Blade to preprocess <better:*> syntax
        $this->extendBladeCompiler();

        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/betterone.php' => config_path('betterone.php'),
        ], 'betterone-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/better'),
        ], 'betterone-views');

        // Publish CSS
        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('vendor/betterone/css'),
        ], 'betterone-css');

        // Share $tw helper with all better components
        \Illuminate\Support\Facades\View::composer('better::*', function ($view) {
            $view->with('tw', function (...$classes) {
                return \TailwindMerge\Laravel\Facades\TailwindMerge::merge(...$classes);
            });
        });
    }

    /**
     * Extend the Blade compiler to support <better:*> syntax.
     */
    protected function extendBladeCompiler(): void
    {
        // Get the BladeCompiler instance
        $blade = $this->app->make('blade.compiler');
        
        // Use Reflection to register a "preparation" callback.
        // This runs BEFORE component tags are compiled, which is exactly what we need.
        // Standard precompilers run AFTER component tags, which is too late.
        $reflection = new \ReflectionClass($blade);
        
        if ($reflection->hasProperty('prepareStringsForCompilationUsing')) {
            $property = $reflection->getProperty('prepareStringsForCompilationUsing');
            $property->setAccessible(true);
            
            $callbacks = $property->getValue($blade);
            
            $callbacks[] = function (string $value) {
                return BetterBladeCompiler::compile($value);
            };
            
            $property->setValue($blade, $callbacks);
        } else {
            // Fallback for older Laravel versions (though Betterone requires ^10.0)
            // We can try prepending to precompilers, but as seen, it might not work.
            // But since betterone needs Laravel 10+, this property should exist.
            \Illuminate\Support\Facades\Log::warning('BetterBladeCompiler: prepareStringsForCompilationUsing property not found!');
        }
    }
}
