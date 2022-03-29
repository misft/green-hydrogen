<?php

namespace App\View\Components\Form;

use App\Traits\Component\BaseForm;
use Illuminate\View\Component;

class Text extends Component
{
    public $value;

    public $label;

    public $name;

    public $placeholder;

    public $password;
    
    public function __construct($value, $label, $name, $placeholder = '', $password = false) {
        $this->value = $value;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->password = $password;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text');
    }
}
