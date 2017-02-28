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
        method_exists($this, $method) ? $this->$method($method) : $this->mainAction($method);
    }

    protected function mainAction($method) {
        if (class_exists('\application\models\\' . $this->fileModel)) {
            echo 'Позже';
        } else {
            $output = new \application\models\FileModel($method);
            var_dump($output);
            //$content = FrontController::getInstance();
            //$content->setContent($output);
        }
    }

}
