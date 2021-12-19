<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public string $name, $type, $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $type, string $label)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.field');
    }
}
