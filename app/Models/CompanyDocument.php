<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'documents', 'description', 'company_document_category_id'
    ];

    public function categories() {
        return $this->belongsToMany(CompanyDocumentHasCategory::class, 'company_document_has_categories', 'document_id', 'category_id', 'id', 'id', 'company_document_categories');
    }
}
