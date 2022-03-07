<?php

namespace App\Models\Traits;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;

trait HasTranslation {
    public function translation() {
        if($this->translation) {
            $code = $language ?? App::getLocale();

            if (!$code) {
                return $this->hasOne($this->translation);
            }

            return $this->hasOne($this->translation)->ofMany([], function ($query) use ($code) {
                $query->when($code, function($subquery) use ($code) {
                    $subquery->with(['translation' => function($q) use ($code) {
                        $q->whereHas('translation', function($q) use ($code) {
                            $q->whereCode($code);
                        });
                    }])->whereRelation('translation', 'code', $code);
                });
            });
        }

        throw new Exception('Translation model has not been set');
    }

    public function translations() {
        if($this->translation) {
            return $this->hasMany($this->translation);
        }

        throw new Exception('Translation model has not been set');
    }
}