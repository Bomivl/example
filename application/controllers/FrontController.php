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
        $this->action = !empty($route[1]) ? strtolower($route[1]) . 'Action' : strtolower($this->controller) . 'Action';
        //$this->model = $this->controller . 'Model';
        $this->route();
    }

    private function route() {
        foreach ($this as $k => $v) {
            echo $k . '=>' . $v . '<br>';
        }
        $controller = $this->controller . 'Controller';
        $this->exists($controller);
    }

    private function exists($data) {
        if (file_exists('application/controllers/' . $data . '.php')) {
            $class = '\application\controllers\\' . $data;
        }else{
            $class = '\application\controllers\IndexController';
        }
        $cont = new $class;
        if (!method_exists($cont, $this->action)) {
            $this->action = strtolower($this->controller) . 'Action';
        }
        return $cont->{$this->action}();
    }

}
