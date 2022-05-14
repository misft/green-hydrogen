<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function company_directory()
    {
        return $this->hasMany(CompanyDirectory::class, 'region_id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'region_id');
    }
}
