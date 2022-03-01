<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_group_id', 'name', 'image', 'link'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function group() {
        return $this->belongsTo(SponsorGroup::class);
    }
}
