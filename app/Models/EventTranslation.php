<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'event_id', 'translation_id', 'title', 'description'
    ];
}
