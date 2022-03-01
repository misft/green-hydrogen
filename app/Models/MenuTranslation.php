<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    use HasFactory, IsTranslation;
    
    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at', 'id', 'menu_id'
    ];

    protected $fillable = [
        'menu_id', 'translation_id', 'name'
    ];  
}
