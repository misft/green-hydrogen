<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = ActivityCategoryTranslation::class;

    protected $guarded = [];

    protected $fillable = [
        'created_at', 'updated_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function activities() {
        return $this->hasMany(Activity::class);
    }
}
