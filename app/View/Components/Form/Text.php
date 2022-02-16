<?php

namespace App\View\Components\Form;

use App\Traits\Component\BaseForm;
use Illuminate\View\Component;

class Text extends Component
{
    use BaseForm;

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
