<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = EventTranslation::class;

    public function category() {
        return $this->belongsTo(EventCategory::class, 'event_category_id', 'id');
    }
}
