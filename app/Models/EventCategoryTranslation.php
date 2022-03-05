<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategoryTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
