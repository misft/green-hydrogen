<?php

namespace App\Models;

use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasTranslation;

    protected $translation = EventTranslation::class;

    protected $fillable = [
        'event_category_id', 'speaker_name', 'speaker_title', 'lat', 'lng', 'location', 'date', 'start_at', 'end_at', 'embed_type', 'embed'
    ];

    protected $appends = [
        'google_maps_url'
    ];

    public function category() {
        return $this->belongsTo(EventCategory::class, 'event_category_id', 'id');
    }

    public function getGoogleMapsUrlAttribute() {
        $lat = $this->attributes['lat'];
        $lng = $this->attributes['lng'];
        $url = env('GOOGLE_MAPS_LINK_URL');

        $params = http_build_query([
            'api' => 1,
            'query' => $lat. ','. $lng
        ]);

        return $url.'?'.$params;
    }
}
