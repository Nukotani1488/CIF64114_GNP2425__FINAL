<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $route;
    public $text;

    public function __construct(string $route, string $text, public string $width = '130', public string $height = '60', public string $color = 'bg-blue-500', public string $textSize = "24") 
    {
        $this->route = route($route);
        $this->text = strtoupper(__($text));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
