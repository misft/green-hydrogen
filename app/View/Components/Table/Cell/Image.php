<?php

namespace App\View\Components\Table\Cell;

use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $src,
        public $isExternal = false
    ) {
        if(!$this->isExternal) {
            $this->src = asset('storage/'.$this->src);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.cell.image');
    }
}
