<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class DeleteRow extends Component
{
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.delete-row');
    }
}
