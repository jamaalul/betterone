<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Icon extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $icon,
        public string $style = 'outline',
        public string $size = 'md',
        public ?string $color = null,
    ) {
    }

    /**
     * Get the size classes for the icon.
     */
    public function sizeClasses(): string
    {
        return match ($this->size) {
            'xs' => 'w-3 h-3',
            'sm' => 'w-4 h-4',
            'md' => 'w-5 h-5',
            'lg' => 'w-6 h-6',
            'xl' => 'w-7 h-7',
            default => 'w-5 h-5',
        };
    }

    /**
     * Get the heroicon component name based on style.
     */
    public function heroiconName(): string
    {
        $prefix = match ($this->style) {
            'solid' => 'heroicon-s',
            'mini' => 'heroicon-m',
            'micro' => 'heroicon-o', // Adjusted micro to outline as fallback if not available
            default => 'heroicon-o',
        };

        return "{$prefix}-{$this->icon}";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.icon');
    }
}
