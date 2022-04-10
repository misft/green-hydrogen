<?php

namespace App\Models;

use App\Helpers\Common;
use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, HasTranslation;

    protected $guarded = [];

    protected $translation = ProjectTranslation::class;

    protected $fillable = [
        'country_id', 'region_id', 'project_category_id', 'name', 'status', 'contact', 'email', 'website', 'total_budget', 'city_id',
        'lat', 'lng', 'image', 'logo', 'member_of_image', 'company_name'
    ];

    protected $appends = [
        'google_maps_url',
    ];

    public function getGoogleMapsUrlAttribute() {
        return Common::mapsUrl($this->attributes['lat'], $this->attributes['lng']);
    }

    public function category() {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
