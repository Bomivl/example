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
            $fileModel = '\application\models\\' . $this->fileModel;
            $arr = explode('\\', get_class($this));
            $action = str_replace('Controller', '', $arr[count($arr) - 1]) . '_view.php';
            new $fileModel($action, $this->title);
        } else {
            $arr = explode('\\', get_class($this));
            $action = str_replace('Controller', '', $arr[count($arr) - 1]) . '_view.php';
            $output = new \application\models\FileModel($action, $this->title);
        }
    }

}
