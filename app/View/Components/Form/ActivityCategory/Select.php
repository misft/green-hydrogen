<?php

namespace App\View\Components\Form\ActivityCategory;

use App\Models\ActivityCategory;
use Illuminate\View\Component;

class Select extends Component
{
    public $items;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->items = ActivityCategory::all();
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.activity-category.select');
    }
}
