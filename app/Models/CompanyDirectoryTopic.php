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

    protected $fillable = [
        'name'
    ];
}
