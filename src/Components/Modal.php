<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Modal extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = 'modal',
        public ?string $title = null,
        public string $size = 'md',
    ) {}

    /**
     * Get the size classes.
     */
    public function sizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'max-w-sm',
            'md' => 'max-w-md',
            'lg' => 'max-w-lg',
            'xl' => 'max-w-xl',
            '2xl' => 'max-w-2xl',
            'full' => 'max-w-full mx-4',
            default => 'max-w-md',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.modal');
    }
}
