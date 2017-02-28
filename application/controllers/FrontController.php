<?php

namespace application\controllers;

/**
 * Description of FrontController
 *
 * @author Михаил
 */
class FrontController {

    static private $instance;

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        echo true;
    }

}
