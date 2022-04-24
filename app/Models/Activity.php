<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = ActivityTranslation::class;

    protected $fillable = [
        'type', 'embed', 'activity_category_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function category() {
        return $this->belongsTo(ActivityCategory::class, 'activity_category_id', 'id');
    }
}
