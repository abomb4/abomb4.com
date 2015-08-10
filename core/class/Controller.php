<?php
namespace CORE;
abstract class Controller implements Controller_i {

    function __construct() {

    }
    // Dont override this function
    public function _execute($func) {
        $this->$func();
    }

    // useful functions
    private function loadView($viewName, $params) {

    }
    private function loadModel() {
        
    }
}