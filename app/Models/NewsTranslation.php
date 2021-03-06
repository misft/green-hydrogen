<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $guarded = [];

    protected $fillable = [
        'title', 'description', 'news_id', 'translation_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function news(){
        return $this->belongsTo(News::class, 'news_id');
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
