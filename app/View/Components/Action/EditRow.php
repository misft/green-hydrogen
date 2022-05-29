<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class EditRow extends Component
{
    public $route;
    public $disable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $disable = null)
    {
        $this->route = $route;
        $this->disable = $disable == 1 ? 'pointer-events: none' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.edit-row');
    }
}
