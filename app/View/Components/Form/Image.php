<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Image extends Component
{
    public $name; 

    public $label; 
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.image');
    }
}
