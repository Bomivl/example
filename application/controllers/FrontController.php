<?php

namespace application\controllers;

class FrontController {

    private $controller, $action, $model;
    static private $instance;

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $route = explode('/', trim(strip_tags($_SERVER['REQUEST_URI']), '/'));
        $this->controller = !empty($route[0]) ? ucfirst(strtolower($route[0])) : 'Index';
        $this->action = !empty($route[1]) ? strtolower($route[1]) . 'Action' : strtolower($this->controller) . 'Action';
        $this->model = $this->controller . 'Model';
        $this->route();
    }

    private function route() {
        $controller = $this->controller . 'Controller';
        $this->exists($controller);
    }

    private function exists($data) {
        if (class_exists('\application\controllers\\' . $data) && $data != 'ParentController') {
            $class = '\application\controllers\\' . $data;
        } else {
            $class = '\application\controllers\IndexController';
            $this->action = 'IndexAction';
        }
        return new $class($this->action, $this->model);
    }

}
