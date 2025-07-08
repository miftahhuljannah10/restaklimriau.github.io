<?php

namespace App\View\Components\main\datatables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class action-buttons extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.datatables.action-buttons');
    }
}
