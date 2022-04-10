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
        'news_category_id', 'embed', 'admin_id'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function category() {
        return $this->belongsTo(NewsCategory::class, 'news_category_id', 'id');
    }

    public function news_translation()
    {
        return $this->hasMany(NewsTranslation::class);
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
