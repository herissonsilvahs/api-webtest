<?php

require '../vendor/autoload.php';

$configs = include(dirname(__DIR__) . '/configs/configs.php');

$app = new Slim\App($configs);

require 'container.php';

require 'models/models.php';
require 'routes/routes.php';

$app->run();