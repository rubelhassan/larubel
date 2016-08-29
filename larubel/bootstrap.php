<?php

require '../vendor/autoload.php';
require 'config.php';

Larubel\Libs\Services\Session::start();

$router = new Larubel\Core\Router\Router();

require '../larubel/app/routes.php';

$db = new Larubel\Database\Database(
    Larubel\Database\Connection::make(DB_CONFIGURATION['database'])
);
