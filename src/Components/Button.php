<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Button extends BetterComponent
{
    public string $variant;
    public string $size;
    public string $type;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $disabled = false,
        string $variant = null,
        string $size = null,
        string $type = 'button',
    ) {
        $this->variant = $variant ?? $this->config('button.default_variant', 'primary');
        $this->size = $size ?? $this->config('button.default_size', 'md');
        $this->type = $type;
    }

    /**
     * Get the variant classes.
     */
    public function variantClasses(): string
    {
        return match ($this->variant) {
            'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
            'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
            'outline' => 'border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-gray-500',
            'ghost' => 'text-gray-700 hover:bg-gray-100 focus:ring-gray-500',
            'destructive' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
            default => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        };
    }

    /**
     * Get the size classes.
     */
    public function sizeClasses(): string
    {
        return match ($this->size) {
            'xs' => 'px-2 py-1 text-xs',
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-sm',
            'lg' => 'px-5 py-2.5 text-base',
            'xl' => 'px-6 py-3 text-lg',
            default => 'px-4 py-2 text-sm',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.button');
    }
}
