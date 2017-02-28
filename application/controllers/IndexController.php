<?php

namespace application\controllers;

/**
 * Description of IndexController
 *
 * @author Михаил
 */
class IndexController {

    public function __construct($method) {
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->mainAction();
        }
    }

    private function mainAction() {
        echo 'WORK';
    }

}
