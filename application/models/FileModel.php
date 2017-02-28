<?php

namespace application\models;

/**
 * Description of FileModel
 *
 * @author Михаил
 */
class FileModel {

    public $mainView = 'main_views.php';

    public function __construct($action) {
        $content = str_replace('Action', '', $action).'_view.php';
        //$mainView = $this->mainView;
        include_once __DIR__.'/../views/'.$this->mainView;
    }

}
