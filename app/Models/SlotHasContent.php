<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotHasContent extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = SlotHasContentTranslation::class;

    public function type() {
        return $this->belongsTo(ContentType::class);
    }

    public function menuSlot() {
        return $this->belongsTo(MenuHasSlot::class, 'menu_has_slot_id', 'id');
    }
}
