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
     * Resolve a semantic color to a Tailwind color.
     *
     * @param string|null $color
     * @return string
     */
    protected function resolveColor(?string $color): string
    {
        if (!$color) {
            return $this->config('colors.primary', 'blue');
        }

        return $this->config("colors.{$color}", $color);
    }

    /**
     * Get useful Tailwind color classes for a given color.
     *
     * @param string|null $color
     * @return array
     */
    protected function colorClasses(?string $color): array
    {
        $resolvedColor = $this->resolveColor($color);

        // Colors that require dark text for better accessibility
        $darkTextColors = ['yellow', 'lime', 'amber', 'orange'];
        $contrastText = in_array($resolvedColor, $darkTextColors) ? 'text-black' : 'text-white';

        return [
            'base' => $resolvedColor,
            'bg' => "bg-{$resolvedColor}-500",
            'text' => "text-{$resolvedColor}-500",
            'border' => "border-{$resolvedColor}-500",
            'ring' => "focus:ring-{$resolvedColor}-500",
            'hover' => "hover:bg-{$resolvedColor}-600",
            'contrast' => $contrastText,
        ];
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
