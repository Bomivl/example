<?php

set_include_path(get_include_path()
        . PATH_SEPARATOR . 'application/controllers'
        . PATH_SEPARATOR . 'application/models'
        . PATH_SEPARATOR . 'application/views');

require_once('application/controllers/FrontController.php');


$controller = FrontController::getInstance();
$controller->route();
echo $controller->getBody();
