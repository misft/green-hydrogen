<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    use HasFactory, IsTranslation;
    
    protected $guarded = [];
}
