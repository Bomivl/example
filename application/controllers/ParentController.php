<?php

namespace application\controllers;

/**
 * Description of ParentController
 *
 * @author Михаил
 */
abstract class ParentController {

    protected $fileModel;
    protected $title = 'Просто сайт';

    public function __construct($method, $model) {
        $this->fileModel = $model;
        method_exists($this, $method) ? $this->$method() : $this->mainAction($method);
    }

    protected function mainAction($method) {
        if (class_exists('\application\models\\' . $this->fileModel)) {
            echo 'Позже';
        } else {
            $arr = explode('\\', get_class($this));
            $method = str_replace('Controller', '', $arr[count($arr) - 1]) . '_view.php';
            $output = new \application\models\FileModel($method, $this->title);
        }
    }

}
