<?php

namespace App\View\Components\Page;

use Illuminate\View\Component;

class Grid extends Component
{
    public $headers;

    public $createRoute;

    public $actionHeader;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers, $createRoute = null, $actionHeader = true)
    {
        $this->headers = array_merge($headers, $actionHeader ? ['Action'] : []);
        $this->createRoute = $createRoute;
        $this->actionHeader = $actionHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page.grid', [
            'create' => true
        ]);
    }
}
