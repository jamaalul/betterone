<?php

namespace Betterone\Betterone\Components;

use Illuminate\View\Component;
use TailwindMerge\Laravel\Facades\TailwindMerge;

/**
 * Abstract base component for all Better components.
 * 
 * Provides shared functionality:
 * - TailwindMerge integration via tw() helper
 * - Configuration access via config() helper
 */
abstract class BetterComponent extends Component
{
    /**
     * Merge Tailwind CSS classes intelligently.
     *
     * @param string ...$classes
     * @return string
     */
    protected function tw(string ...$classes): string
    {
        return TailwindMerge::merge(...$classes);
    }

    /**
     * Get a configuration value from betterone config.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function config(string $key, mixed $default = null): mixed
    {
        return config("betterone.{$key}", $default);
    }
}
