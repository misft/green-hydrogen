<?php

namespace App\View\Components\Form;

use App\Models\Translation;
use Illuminate\View\Component;

class Localization extends Component
{
    public $translations;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->translations = Translation::pluck('name', 'id');
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.localization');
    }
}
