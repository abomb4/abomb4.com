<?php
namespace CORE;
abstract class Common {


    static public function boot() {

    }
    /**
     * Load necessary class
     */
    static private function loadClass($classType, $className) {

        $fileName = $className . ".php";
        switch ($classType) {
            case "Controller":
                $folder = "controller/";
                break;
            default:
                $folder = "";
        }
        $path = APPPATH.$folder.$fileName;
        if (file_exists($path)) {
            include_once $path;
        } else {
            echo $path." not exists";
        }
    }
    /**
     * Parse controller path and method
     */
    static private function parseUri($uri) {
        $path = trim(parse_url($uri)['path'], '/');

        $r = explode("/", $path);
        for ($i = count($r) - 1; $i > 0; $i--) {
            echo $r[$i];
        }
        var_dump($r);
    }
    /**
     * This function finds controller
     */
    static private function findController($c) {

        loadClass("Controller", $c);
        return new $c;
    }


}