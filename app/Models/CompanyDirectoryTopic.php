<?php

namespace App\Models;

use App\Http\Controllers\Admin\CompanyDirectoryTopicController;
use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirectoryTopic extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = CompanyDirectoryTopicTranslation::class;

    protected $hidden = [
        'name', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'name'
    ];

    public function company_directory()
    {
        return $this->hasMany(CompanyDirectory::class, 'company_directory_topic_id');
    }
}
