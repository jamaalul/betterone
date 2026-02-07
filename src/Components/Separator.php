<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Separator extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $orientation = 'horizontal',
    ) {}

    /**
     * Get orientation classes.
     */
    public function orientationClasses(): string
    {
        return match ($this->orientation) {
            'horizontal' => 'w-full h-px',
            'vertical' => 'h-full w-px',
            default => 'w-full h-px',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.separator');
    }
}
