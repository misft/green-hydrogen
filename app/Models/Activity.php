<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = ActivityTranslation::class;

    protected $fillable = [
        'type', 'embed'
    ];
}
