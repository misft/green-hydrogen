<?php

namespace App\Helpers;

class Common {
    public static function mapsUrl($lat, $lng) {
        $coordinate = implode(',', [$lat, $lng]);

        $params = http_build_query([
            'api' => config('maps.intent.version'),
            'query' => $coordinate
        ]);

        return config('maps.intent.base_url').'?'.$params;
    }
}