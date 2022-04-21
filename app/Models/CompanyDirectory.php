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
        'password', 'remember_token', 'api_token'
    ];

    protected $fillable = [
        'company_directory_topic_id', 'contact_person','region_id', 'name', 'email', 'address','password', 'description', 'photo', 'image', 'contact', 'website', 'lat', 'lng', 'is_email_verified'
    ];

    public static $scopes = [];

    public function scopeEmail($query, $email) {
        return $query->whereEmail($email);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function documents() {
        return $this->hasMany(CompanyDocument::class);
    }

    public function topics() {
        return $this->belongsToMany(CompanyHasTopic::class);
    }

    public function company_directory_verify()
    {
        return $this->hasOne(CompanyDirectoryVerify::class);
    }
}
