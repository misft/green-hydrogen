<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPublicationTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'title', 'description', 'video_publication_id', 'translation_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function publication() {
        return $this->belongsTo(VideoPublication::class);
    }
}
