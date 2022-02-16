<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = MenuTranslation::class;

    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function menuGroup() {
        return $this->belongsTo(MenuGroup::class);
    }

    public function slots() {
        return $this->hasMany(MenuHasSlot::class);
    }
}
