<?php

return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'debug'=>false,
        'outputBuffering' => false,
        'displayErrorDetails' => true,
        'twig' => [
            'path' => dirname(__DIR__) . '/src/resources/views',
            'cache_path' => dirname(__DIR__) .'/src/resources/cache',
            'enable_cache' => dirname(__DIR__) .'true',
        ],
        'db' => [
            'driver' => 'pgsql',
            'host' => parse_url(getenv('DATABASE_URL')),
            'database' => 'WebTest_App',
            'username' => 'root',
            'password' => '',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix'    => '',
        ]
    ],
];