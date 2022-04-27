<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategoryTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'project_category_id',
        'translation_id',
        'name'
    ];

    public function project_category(){
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
