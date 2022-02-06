<?php

namespace App\Models;

use App\Models\Casts\Content;
use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotHasContentTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $casts = [
        'content' => 'array'
    ];
}
