<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInputs extends Component
{
    public function __construct(
        public string $type = 'text',
        public string $name = '',
        public string $label = '',
        public string $placeholder = '',
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        switch($this->type) {
            case 'text': {
                return view('components.form-inputs.text', ['type' => 'text']);
            }
            case 'email': {
                return view('components.form-inputs.text', ['type' => 'email']);
            }
            case 'password': {
                return view('components.form-inputs.text', ['type' => 'password']);
            }
            case 'date': {
                return view('components.form-inputs.date');
            }
            case 'number': {
                return view('components.form-inputs.number');
            }
            case 'submit': {
                return view('components.form-inputs.submit');
            }
            default: {
                return view('components.form-inputs.text', ['type' => 'text']);
            }
        }
    }
}
