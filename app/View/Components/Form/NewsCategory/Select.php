<?php

namespace App\View\Components\Form\NewsCategory;

use App\Models\NewsCategory;
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
        $this->items = NewsCategory::all(); 
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.news-category.select');
    }
}
