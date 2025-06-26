<?php

namespace App\View\Components\before-login\produk;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class produk-grid extends Component
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
        return view('components.before-login.produk.produk-grid');
    }
}
