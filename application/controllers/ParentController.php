<?php

namespace application\controllers;

/**
 * Description of ParentController
 *
 * @author Михаил
 */
abstract class ParentController {

    protected $fileModel;

    public function __construct($method, $model) {
        $this->fileModel = $model;
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->mainAction();
        }
    }

    protected function mainAction() {
        if (class_exists('\application\models\\' . $this->fileModel)) {
            echo "существует";
        } else {
            echo 'несуществует';
        }
    }

}
