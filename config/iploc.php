<?php

return [
    /**
     * These configurations are required for the
     * package to do its job.
     */
    'service' => [
        'base_url' => env('IPLOC_BASE_URL', ''),
        'api_key' => env('IPLOC_API_KEY', '')
    ],
    /**
     * Enables cache will reduce the request made to
     * service's endpoint, the package will use
     * application's default cache store if enabled.
     * 
     * If you wish to use custom cache store define
     * the cache store name here.
     * 
     */
    'cache' => [
        'enabled' => env('IPLOC_CACHE_ENABLED', false),
        'ttl' => env('IPLOC_CACHE_TTL', 86400), // in seconds
        'store' => env('IPLOC_CACHE_STORE', 'default'),
    ]
];
