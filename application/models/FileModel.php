<?php

namespace application\models;

/**
 * Description of FileModel
 *
 * @author Михаил
 */
class FileModel {

    public $mainView = 'main_views.php';

    public function __construct($content, $title) {
        //$content = str_replace('Controller', '', $action) . '_view.php';
        include_once __DIR__ . '/../views/' . $this->mainView;
    }

}
