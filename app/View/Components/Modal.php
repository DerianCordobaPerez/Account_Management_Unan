<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $id, $title;
    public bool $scrollable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $title, bool $scrollable = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->scrollable = $scrollable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
