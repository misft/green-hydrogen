<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = MenuGroupTranslation::class;

    protected $guarded = [];
}
