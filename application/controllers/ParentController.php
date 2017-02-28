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
        method_exists($this, $method) ? $this->$method() : $this->mainAction();
    }

    protected function mainAction() {
        if (class_exists('\application\models\\' . $this->fileModel)) {
            $this->fileModel;
        } else {
            echo $this->fileModel;
        }
    }

}
