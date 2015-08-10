<?php
/**
 * This file defines some common function
 * @author yangrl <yangrlx@gmail.com>
 */
namespace CORE;
require_once COREPATH.'interface/Controller_i.php';
require_once COREPATH.'class/Controller.php';

/**
 * Load necessary class
 */
function loadClass($classType, $className, $path = '') {

    $fileName = $className . ".php";
    switch ($classType) {
        case "Controller":
            $folder = CONTROLLERPATH.$path.'/';
            break;
        default:
            $folder = "";
    }
    $path = $folder.$fileName;
    if (file_exists($path)) {
        include_once $path;
    } else {
        echo $path." not exists";
    }
}
/**
 * Parse controller path and method
 * deals this conditions:
 * /path/Class/method
 * /path/Class
 * /Class
 */
function parseUri($url) {
    $divided_path = explode('/', trim(parse_url($url)['path'], '/'));
    $method = "index";
    $class = "";
    $path = "";
    $length = count($divided_path);
    if ($length == 0) {
        return array("/", "Index");
    } else if ($length == 1) {
        if (! is_file(CONTROLLERPATH.ucfirst($path).".php")){
            $class = ucfirst($divided_path[$length - 1]);
        }
    } else {
        for ($i = 1; $i < $length && $i <= 2; $i++) {
            $path = trim(substr($url, 0, strripos($url, $divided_path[$length - $i - 1])).$divided_path[$length - $i - 1], '/');
            if (is_dir(CONTROLLERPATH.$path)) {
                $class = ucfirst($divided_path[$length - $i]);
                if ($i == 2)
                    $method = $divided_path[$length - $i + 1];
                break;
            } else if (is_file(CONTROLLERPATH.ucfirst($path).".php")){
                $class = ucfirst($divided_path[$length - $i - 1]);
                $method = $divided_path[$length - $i - 1];
                break;
            }
        }
    }
    if ($class == "") {
        // echo "Cannot parse url.";
    }
    // echo $path.'  '.$class.'  '.$method."<br>";
    return array($path, $class, $method);
}
/**
 * This function finds controller
 */
function findController($c, $path = '') {

    loadClass("Controller", $c, $path);
    return new $c;
}

