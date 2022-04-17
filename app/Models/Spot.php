<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'name', 'section_id', 'translation_id', 'order'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function content(){
        return $this->hasMany(Content::class);
    }
}
