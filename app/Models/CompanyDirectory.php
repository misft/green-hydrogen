<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class CompanyDirectory extends Authenticatable
{
    use HasFactory, HasApiTokens;

    public $guarded = [];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public static $scopes = [];

    public function scopeEmail($query, $email) {
        return $query->whereEmail($email);
    }
}
