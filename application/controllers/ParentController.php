<?php

namespace application\controllers;

/**
 * Description of ParentController
 *
 * @author Михаил
 */
abstract class ParentController {

    public function __construct($method) {
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->mainAction();
        }
    }

    protected function mainAction() {
        echo 'parent';
    }

}
