<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class ExternalLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $route = '',
        public $label = 'Click'
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.external-link');
    }
}
