<?php
//Global Constants
define('SITE_NAME', 'grp5');
define('ROOT_DIR', dirname(getcwd()) . '/' . SITE_NAME.'/');
define('URL_DIR', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']
	. '/' . SITE_NAME.'/');

//Load required classes automatically
function __autoload($class)
{
	if(file_exists(ROOT_DIR."controllers/Class.$class.php")){
		require(ROOT_DIR."controllers/Class.$class.php");
		return;
	}

	if(file_exists(ROOT_DIR."models/Class.$class.php")){
		require(ROOT_DIR."models/Class.$class.php");
		return;
	}

	if(file_exists(ROOT_DIR."dal/Class.$class.php")){
		require(ROOT_DIR."dal/Class.$class.php");
		return;
	}
}

session_start();

//Call controller method and view
require_once 'Class.Routing.php';
Routing::getInstance()->route();
