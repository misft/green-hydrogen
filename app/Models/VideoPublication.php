<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPublication extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = VideoPublicationTranslation::class;

    protected $fillable = ['embed', 'admin_id'];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
