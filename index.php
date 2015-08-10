<?php

/**
 * This is the entry of x4xphp framework, defines some "system variables"
 * @author yangrl <yangrlx@gmail.com>
 */

/**
 * Path to x4xphp framework core folder path
 */
$core_path = 'core';

/**
 * Path to userapp folder path
 */
$app_folder = "app";
$controller_folder = "controller";

/**
 * deal path
 */
if (realpath($core_path) !== FALSE) {
    $core_path = realpath($core_path).'/';
}
$core_path = rtrim($core_path, '/').'/';
define('COREPATH', str_replace("\\", "/", $core_path));

define('APPPATH', realpath($app_folder).'/');
define('CONTROLLERPATH', APPPATH.$controller_folder.'/');


require_once COREPATH.'/boot.php';
/*
require_once COREPATH.'/base/Common.php';
Core\Common::boot();
*/
