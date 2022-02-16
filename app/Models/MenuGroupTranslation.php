<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroupTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $guarded = [];

    protected $hidden = [
        'id', 'menu_group_id', 'translation_id', 'created_at', 'updated_at'
    ];
}
