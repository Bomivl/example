<?php

namespace application\controllers;

class FrontController {

    private $controller, $action;
    static private $instance;

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $route = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->controller = !empty($route[0]) ? ucfirst(strtolower($route[0])) : 'Index';
        $this->action = !empty($route[1]) ? strtolower($route[1]) . 'Action' : $this->controller . 'Action';
        $this->route();
    }

    private function route() {
        echo true;
    }

}
