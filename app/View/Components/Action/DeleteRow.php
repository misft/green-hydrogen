<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class DeleteRow extends Component
{
    public $action;
    public $idform;
    public $disable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action,$idform, $disable = null)
    {
        $this->action = $action;
        $this->idform = $idform;
        $this->disable = $disable == 1 ? 'disabled' : '';
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
