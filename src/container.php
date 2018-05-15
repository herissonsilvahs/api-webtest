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

// $container['view'] = function($container) {
//     $settings = $container->get('settings');
//     $viewPath = $settings['twig']['path'];

//     $twig = new \Slim\Views\Twig($viewPath, [
//         'cache' => $settings['twig']['cache_enabled'] ? $settings['twig']['cache_path'] : false
//     ]);

//     /** @var Twig_Loader_Filesystem $loader */
//     $loader = $twig->getLoader();
//     $loader->addPath($settings['public'], 'public');

//     // Instantiate and add Slim specific extension
//     $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
//     $twig->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

//     return $twig;
// };

$container['db'] = function (Container $container) {
    $settings = $container->get('settings');

    $config = [
        'driver' => $settings['db']['mysql'],
        'host' => $settings['db']['host'],
        'database' => $settings['db']['database'],
        'username' => $settings['db']['username'],
        'password' => $settings['db']['password'],
        'charset'  => $settings['db']['charset'],
        'collation' => $settings['db']['collation'],
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