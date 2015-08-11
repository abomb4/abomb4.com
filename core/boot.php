<?php
/**
 * This file starts x4xphp framework's main program,
 * load config, execute filter, find Controller and execute it, etc
 * @author yangrl <yangrlx@gmail.com>
 */
namespace CORE;

include_once COREPATH.'common.php';

// x4xphp run process:
// read config
// find required class and method
//var_dump($_SERVER);
$parsed = parseUri($_SERVER['REQUEST_URI']);
if (is_array($parsed)) {
    list($path, $class, $method) = $parsed;
    $c = findController($class, $path);
    $c->_execute($method);
} else {
    show404();
}
// execute controller