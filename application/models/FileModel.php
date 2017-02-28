<?php

namespace application\models;

/**
 * Description of FileModel
 *
 * @author Михаил
 */
class FileModel {

    protected $mainView = 'main_views.php';

    public function __construct($action) {
        $content = str_replace('Action', '', $action).'_view.php';
        ob_start();
        include __DIR__.'/../views/'.$this->mainView;
        return ob_get_clean();
    }

}
