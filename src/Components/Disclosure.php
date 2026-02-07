<?php

namespace Betterone\Betterone\Components;

use Illuminate\Contracts\View\View;

class Disclosure extends BetterComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title = null,
        public bool $open = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('better::components.disclosure');
    }
}
