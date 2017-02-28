<?php

use application\controllers\FrontController;

error_reporting(-1);

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

$controller = FrontController::getInstance();
//echo $controller->getBody();
