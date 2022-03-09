<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Embed extends Component
{
    public function __construct(
        public $value,
        public $name,
        public $placeholder,
        public $label
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.embed');
    }
}
