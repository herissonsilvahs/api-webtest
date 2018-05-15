<?php

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Connection;

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('logger');
    $file_handler = new \Monolog\Handler\StreamHandler('logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function (Container $container) {
    $settings = $container->get('settings');

    $config = [
        'driver' => $settings['db']['mysql'],
        'host' => $settings['db']['host'],
        'database' => $settings['db']['database'],
        'username' => $settings['db']['username'],
        'password' => $settings['db']['password'],
        'charset'  => $settings['db']['charset'],
        'prefix' => $settings['db']['prefix'],
    ];

    $factory = new ConnectionFactory(new \Illuminate\Container\Container());

    return $factory->make($config);
};

$container['pdo'] = function (Container $container) {
    return $container->get('db')->getPdo();
};

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();