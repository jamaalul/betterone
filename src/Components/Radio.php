<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Radio extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public array $options = [],
        public ?string $selected = null,
        public bool $disabled = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.radio');
    }
}
