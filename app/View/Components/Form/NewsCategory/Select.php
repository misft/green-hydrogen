<?php

namespace App\View\Components\Form\NewsCategory;

use App\Models\NewsCategory;
use App\Models\NewsCategoryTranslation;
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
        $this->items = NewsCategoryTranslation::groupBy('news_category_id')->pluck('name', 'news_category_id as id'); 
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
