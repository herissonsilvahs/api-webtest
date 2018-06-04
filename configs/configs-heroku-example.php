<?php

$db = parse_url(getenv('DATABASE_URL'));

return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'debug'=>false,
        'outputBuffering' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'pgsql',
            'host' => $db['host'],
            'database' => ltrim($db['path'],'/'),
            'username' => $db['user'],
            'password' => $db['pass'],
            'port' => $db['port'],
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ]
    ],
];