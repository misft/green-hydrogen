<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategoryTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'name', 'news_category_id', 'translation_id'
    ];
}
