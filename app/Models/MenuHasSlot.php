<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHasSlot extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function slot() {
        return $this->belongsTo(Slot::class);
    }

    public function content() {
        return $this->hasMany(SlotHasContent::class);
    }

    public function translatedContent() {
        return $this->hasMany(SlotHasContent::class)->localize();
    }
}
