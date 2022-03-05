<?php

namespace App\View\Components\Table\Cell;

use Illuminate\View\Component;

class Language extends Component
{
    public $items;

    public string $key;

    public bool $encode;

    public bool $html;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items, string $key, bool $encode = false, $html = false)
    {
        $this->items = $items;
        $this->key = $key;
        $this->encode = $encode;
        $this->html = $html;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.cell.language');
    }
}
