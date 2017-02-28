<?php

namespace application\controllers;

/**
 * Description of IndexController
 *
 * @author Михаил
 */
class IndexController {
    //put your code here
    public function __construct($method) {
        if(method_exists($this, $method)){
            echo $method.' существует';
        }else{
            echo 'перенаправление на main';
        }
    }
    public function mainAction(){
        echo 'WORK';
    }
    public function test(){
        echo 'asd';
    }
}
