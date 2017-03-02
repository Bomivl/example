<?php

namespace application\models;

/**
 * Description of AjaxModel
 *
 * @author Михаил
 */
class AjaxModel {

    public function __construct($content, $title) {
        $res = self::query();
        //$this->exec('asdasdasdasdasd');
        include_once __DIR__ . '/../views/main_views.php';
    }

    public static function query() {
        $sql = "SELECT content FROM content  WHERE title = 'AJAX'";
        $obj = new \application\Db();
        return $obj->query($sql);
    }

    public static function exec($change) {
        $sql = "UPDATE content 
                    SET content= :content
                    where title= 'AJAX'";
        $obj = new \application\Db();
        $obj->execute($sql, [':content'=>$change]);
    }

}
