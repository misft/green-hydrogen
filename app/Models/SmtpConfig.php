<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtpConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'smtp_server',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_auth',
        'smtp_from'
    ];
}
