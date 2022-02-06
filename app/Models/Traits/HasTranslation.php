<?php

namespace App\Models\Traits;

use Exception;

trait HasTranslation {
    public function translation() {
        if($this->translation) {
            return $this->hasMany($this->translation);
        }

        throw new Exception('Translation model has not been set');
    }
}