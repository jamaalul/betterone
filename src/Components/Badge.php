<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Badge extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant = 'primary',
        public string $size = 'md',
    ) {}

    /**
     * Get the variant classes.
     */
    public function variantClasses(): string
    {
        return match ($this->variant) {
            'primary' => 'bg-blue-100 text-blue-800',
            'secondary' => 'bg-gray-100 text-gray-800',
            'success' => 'bg-green-100 text-green-800',
            'danger' => 'bg-red-100 text-red-800',
            'warning' => 'bg-yellow-100 text-yellow-800',
            'info' => 'bg-cyan-100 text-cyan-800',
            default => 'bg-blue-100 text-blue-800',
        };
    }

    /**
     * Get the size classes.
     */
    public function sizeClasses(): string
    {
        return match ($this->size) {
            'xs' => 'px-1.5 py-0.5 text-xs',
            'sm' => 'px-2 py-0.5 text-xs',
            'md' => 'px-2 py-1 text-sm',
            'lg' => 'px-3 py-1.5 text-sm',
            default => 'px-2 py-1 text-sm',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.badge');
    }
}
