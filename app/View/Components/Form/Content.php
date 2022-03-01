<?php

namespace App\View\Components\Form;

use App\Models\ContentType;
use App\Models\SlotHasContent;
use Illuminate\View\Component;

class Content extends Component
{
    public $slotContent;

    public $translation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slotContent, $translation)
    {
        $this->slotContent = $slotContent;
        $this->translation = $translation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.content', [
            'props' => json_decode($this->slotContent->contentType->props ?? "[]")
        ]);
    }
}
