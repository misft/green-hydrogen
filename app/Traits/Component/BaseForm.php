<?php

namespace App\Traits\Component;

trait BaseForm {
    public $value;

    public $label;

    public $name;

    public $placeholder;
    
    public function __construct($value, $label, $name, $placeholder = '') {
        $this->value = $value;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }
}