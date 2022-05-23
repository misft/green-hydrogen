<?php

namespace App\Models;

use App\Models\Traits\IsTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    use HasFactory, IsTranslation;

    protected $fillable = [
        'title', 'description', 'project_id', 'translation_id', 'name'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
