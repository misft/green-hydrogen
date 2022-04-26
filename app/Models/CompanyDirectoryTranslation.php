<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirectoryTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'company_directory_id',
        'translation_id',
        'description'
    ];

    public function company_directory(){
        return $this->belongsTo(CompanyDirectory::class, 'company_directory_id');
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
