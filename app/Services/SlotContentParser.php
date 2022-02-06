<?php

namespace App\Services;

class SlotContentParser {
    public static function parse(array $value) {
        return (object) $value;
    }
}