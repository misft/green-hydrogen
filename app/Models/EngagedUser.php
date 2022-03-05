<?php

namespace App\Models;

use App\Models\Traits\SerializeDate;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngagedUser extends Model
{
    use HasFactory, SerializeDate;

    protected $fillable = [
        'name', 'email', 'subject', 'question', 'is_answered'
    ];
}
