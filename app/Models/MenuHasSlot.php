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

    protected $guarded = [];

    protected $fillable = [
        'menu_id', 'slot_id', 'order'
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
}
