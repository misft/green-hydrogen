<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotHasContent extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = SlotHasContentTranslation::class;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $guarded = [];

    public function contentType() {
        return $this->belongsTo(ContentType::class);
    }

    public function menuSlot() {
        return $this->belongsTo(MenuHasSlot::class, 'menu_has_slot_id', 'id');
    }
}
