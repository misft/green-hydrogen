<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'name', 'props', 'descriptions', 'form'
    ];
}
