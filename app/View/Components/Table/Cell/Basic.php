<?php

namespace App\View\Components\Table\Cell;

use Illuminate\View\Component;

class Basic extends Component
{
    public $item;

    public $key;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $key)
    {
        $this->item = $item;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.cell.basic');
    }
}
