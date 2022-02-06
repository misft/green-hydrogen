<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHasSlot extends Model
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function slot() {
        return $this->belongsTo(Slot::class);
    }
}
