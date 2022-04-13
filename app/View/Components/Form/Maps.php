<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Maps extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $identifier = '',
        public $lat = 60,
        public $lng = 110,
        public $latName = 'lat',
        public $lngName = 'lng',
    )
    {
        $this->lat != null ?: $this->lat = -6.171972072513641;
        $this->lng != null ?: $this->lng = 106.82780636800466;

    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->identifier == 'event_1') return view('components.form.maps'); else return view('components.form.maps2');
    }
}
