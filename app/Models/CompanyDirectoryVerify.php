<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirectoryVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_directory_id',
        'token'
    ];

    public function company_directory()
    {
        return $this->belongsTo(CompanyDirectory::class, 'company_directory_id');
    }
}
