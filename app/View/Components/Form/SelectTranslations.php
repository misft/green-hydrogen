<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class SelectTranslations extends Component
{
    public $items;

    public $name; 

    public $value;

    public $label;

    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, $name, $value, $label, $placeholder = '')
    {
        $this->items = $items;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select-translations');
    }
}
