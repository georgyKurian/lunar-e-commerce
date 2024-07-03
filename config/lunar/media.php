<?php

use Lunar\Base\StandardMediaConversions;

return [

    'conversions' => [
        StandardMediaConversions::class,
    ],

    'fallback' => [
        'url' => env('FALLBACK_IMAGE_URL', '/images/fallback.png'),
        'path' => env('FALLBACK_IMAGE_PATH', null),
    ],

];
