<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = NewsTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'news_category_id', 'embed'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function categories() {
        return $this->belongsToMany(NewsHasCategory::class);
    }
}
