<?php

$db = parse_url(getenv('DATABASE_URL'));

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
            'host' => $db['host'],
            'database' => ltrim($db['path'],'/'),
            'username' => $db['user'],
            'password' => $db['pass'],
            'port' => $db['port'],
            'charset'   => '',
            'collation' => '',
            'prefix'    => '',
        ]
    ],
];