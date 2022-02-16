<?php

namespace App\View\Components\Form;

use App\Traits\Component\BaseForm;
use Illuminate\View\Component;

class File extends Component
{
    public $multiple;

    public $name;

    public $label;

    public function __construct($label, $name, $multiple)
    {
        $this->label = $label;
        $this->name = $name;
        $this->multiple = $multiple ? 'multiple' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.file');
    }
}
