<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'name', 'parent', 'translation_id', 'order', 'link'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function section_group(){
        return $this->belongsTo(SectionGroup::class);
    }

    public function spots() {
        return $this->hasMany(Spot::class);
    }
}
