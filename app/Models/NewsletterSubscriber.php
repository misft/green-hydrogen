<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'is_active'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function scopeEmail($query, $email) {
        return $query->where('email', $email);
    }
}
