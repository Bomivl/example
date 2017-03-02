<?php

include __DIR__ . '/../autoload.php';
//$test = $_SERVER['HTTP_REFERER'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $route = explode('/', trim(strip_tags($_SERVER['HTTP_REFERER']), '/'));
    $from = strtolower($route[count($route) - 1]);
    switch ($from) {
        case 'ajax':
            $cont = $_POST['param'];
            if ($cont) {
                application\models\AjaxModel::exec($cont);
                $res = application\models\AjaxModel::query();
                echo json_encode($res);
            }
            break;

        default:
            die();
            break;
    }
}
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $cont = $_POST['param'];
//    if ($cont) {
//        application\models\AjaxModel::exec($cont);
//        $res = application\models\AjaxModel::query();
//        echo json_encode($res);
//    }
//}