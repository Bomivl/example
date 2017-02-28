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
        $route = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->controller = !empty($route[0]) ? ucfirst(strtolower($route[0])) : 'Index';
        $this->action = !empty($route[1]) ? strtolower($route[1]) . 'Action' : $this->controller . 'Action';
        $this->model = $this->controller . 'Model';
        $this->route();
    }

    private function route() {
        foreach ($this as $k => $v) {
            echo $k . '=>' . $v . '<br>';
        }
        $controller = $this->controller . 'Controller';
        if(class_exists($controller)){
            echo "ASDASDASDASD";
        }
    }

    private function exists($data) {
//        echo '\application\controllers' . $data;
//        if (!class_exists("\application\controllers$data"))
//            return true;
    }

}
