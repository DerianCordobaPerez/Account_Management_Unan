<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    public string $name, $id, $key, $label;
    public Collection|array $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $id, string $key, string $label, $options)
    {
        $this->name = $name;
        $this->id = $id;
        $this->key = $key;
        $this->label = $label;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
