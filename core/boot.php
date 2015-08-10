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
list($path, $class, $method) = parseUri($_SERVER['REQUEST_URI']);
$c = findController($class, $path);
$c->_execute($method);
// execute controller