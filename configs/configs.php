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
            'driver' => 'mysql',
            'host' => 'mysql-5.7.22.app',
            'database' => 'WebTest_App',
            'username' => 'root',
            'password' => 'root',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix'    => '',
        ]
    ],
];