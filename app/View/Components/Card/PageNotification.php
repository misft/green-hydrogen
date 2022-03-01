<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class PageNotification extends Component
{
    public $message;

    public $title;

    public $type;

    public $background;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->type = session('error') ? 'error' : 'success';
        $this->background = session('error') ? 'bg-danger' : 'bg-success';
        $this->message = session('error') ? session('error') : session('success');
        $this->title = session('error') ? 'Alert' : 'Info';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.page-notification');
    }
}
