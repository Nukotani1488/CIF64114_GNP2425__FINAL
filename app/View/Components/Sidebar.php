<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $routes;

    public function __construct(
        public $currentPage,
    )
    {
        $this->routes = [
            __('sidebar.profile') => route('profile.index'),
            __('sidebar.dashboard') => route('dashboard.index'),
            __('sidebar.stats') => route('stats.index'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
