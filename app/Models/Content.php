<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'name', 'spot_id', 'translation_id', 'order', 'types', 'positions', 'content'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function spot() {
        return $this->belongsTo(Spot::class);
    }
}
