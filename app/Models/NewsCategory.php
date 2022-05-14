<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = NewsCategoryTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'created_at', 'updated_at'
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'news_category_id');
    }
}
