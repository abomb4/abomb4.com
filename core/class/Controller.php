<?php
namespace CORE;
abstract class Controller implements Controller_i {

    function __construct() {
    }
    // Custom controller Don't override this function
    public function _execute($func) {
        if (!isset($this->$func) || !is_callable($this->$func))
            show404();
        else $this->$func();
    }

    /**
     * Load an view class and render
     */
    protected function loadView($viewName, $params = array()) {
        if (is_file(VIEWPATH.$viewName.".php")) {
            extract($params);
            require VIEWPATH.$viewName.".php";
        } else {
            return false;
        }
    }

    /**
     * Load a service class, a php instance should only one service object.
     */
    protected function loadService($modelName) {
    }

    /**
     *
     */
    protected function loadUtil($utilName) {
    }
}