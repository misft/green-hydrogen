<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = ProjectCategoryTranslation::class;

    protected $fillable = ['name'];

    // public function project_category_translation()
    // {
    //     return $this->hasMany(ProjectCategoryTranslation::class);
    // }
}
