<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = MenuGroupTranslation::class;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function menus() {
        return $this->hasMany(Menu::class);
    }

    public function translatedMenus() {
        return $this->hasMany(Menu::class)->localize();
    }
}
