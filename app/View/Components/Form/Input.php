<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $name, $type, $label, $id;
    public bool $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $type, string $label, string $id, bool $disabled = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->id = $id;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
