<?php

namespace App\View\Components\Form\ActivityCategory;

use App\Models\ActivityCategoryTranslation;
use Illuminate\View\Component;

class Select extends Component
{
    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = ActivityCategoryTranslation::groupBy('activity_category_id')->pluck('name', 'activity_category_id as id');
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
