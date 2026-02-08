<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Button extends BetterComponent
{
    public string $variant;
    public string $size;
    public string $type;
    public ?string $icon;
    public ?string $color;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $disabled = false,
        string $variant = null,
        string $size = null,
        string $type = 'button',
        string $icon = null,
        string $color = null,
    ) {
        $this->variant = $variant ?? $this->config('button.default_variant', 'primary');
        $this->size = $size ?? $this->config('button.default_size', 'md');
        $this->type = $type;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the variant classes.
     */
    public function variantClasses(): string
    {
        $colors = $this->colorClasses($this->color);
        $base = $colors['base'];
        $contrast = $colors['contrast'];

        return match ($this->variant) {
            'primary' => "{$colors['bg']} {$contrast} {$colors['hover']} {$colors['ring']}",
            'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
            'outline' => "border border-{$base}-300 text-{$base}-700 hover:bg-{$base}-50 {$colors['ring']}",
            'ghost' => "text-{$base}-700 hover:bg-{$base}-100 {$colors['ring']}",
            'destructive' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
            default => "{$colors['bg']} {$contrast} {$colors['hover']} {$colors['ring']}",
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
