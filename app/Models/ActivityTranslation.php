<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'activity_id', 'translation_id', 'title', 'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
