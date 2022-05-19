<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirectoryTopicTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'company_directory_topic_id',
        'translation_id',
        'name'
    ];

    public function company_directory_topic(){
        return $this->belongsTo(CompanyDirectoryTopic::class, 'company_directory_topic_id');
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
