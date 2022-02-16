<?php

namespace App\View\Components\Page;

use Illuminate\View\Component;

class Grid extends Component
{
    public $headers;

    public $createRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers, $createRoute)
    {
        $this->headers = array_merge($headers, ['Action']);
        $this->createRoute = $createRoute;
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
