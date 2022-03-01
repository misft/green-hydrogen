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

    public function category() {
        return $this->belongsTo(CompanyDocumentCategory::class);
    }
}
