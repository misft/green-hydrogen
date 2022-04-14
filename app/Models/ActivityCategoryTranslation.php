<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategoryTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'translation_id', 'activity_category_id', 'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
