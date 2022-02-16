<?php

namespace App\Models\Traits;

use Exception;
use Illuminate\Database\Eloquent\Builder;

trait HasTranslation {
    public function translation() {
        if($this->translation) {
            return $this->hasOne($this->translation);
        }

        throw new Exception('Translation model has not been set');
    }

    public function translations() {
        if($this->translation) {
            return $this->hasMany($this->translation);
        }

        throw new Exception('Translation model has not been set');
    }

    public function scopeLocalize($query, $language = null) {
        $code = $language ?? request()->header('Accept-Language');
        
        if(empty($code)) {
            return $query->with('translation');
        }

        return $query->whereRelation('translation.translation', 'code', $code)->with(['translation' => function($query) use ($code) {
            $query->whereHas('translation', function($subquery) use ($code) {
                $subquery->whereCode($code);
            });
        }]);
    }
}