<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Input extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'text',
        public ?string $name = null,
        public ?string $label = null,
        public ?string $placeholder = null,
        public bool $disabled = false,
        public ?string $error = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.input');
    }
}
