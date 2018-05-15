<?php

return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'debug'=>false,
        'outputBuffering' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'dbname',
            'username' => '',
            'password' => '',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix'    => '',
        ]
    ],
];