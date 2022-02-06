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

    public function menuGroup() {
        return $this->belongsTo(MenuGroup::class);
    }
}
