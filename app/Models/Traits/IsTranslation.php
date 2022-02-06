<?php

namespace App\Models\Traits;

use App\Models\Translation;
use Exception;

trait IsTranslation {
    public function translation() {
        return $this->belongsTo(Translation::class);
    }
}