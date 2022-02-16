<?php

namespace App\Traits\Component;

trait BaseForm {
    public $value;

    public $label;

    public $name;
    
    public function __construct($value, $label, $name) {
        $this->value = $value;
        $this->label = $label;
        $this->name = $name;
    }
}