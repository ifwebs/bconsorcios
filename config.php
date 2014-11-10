<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors',true);
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('PATH',realpath(dirname(__FILE__)));
define('PATH_LIBRARY',PATH . DS . 'app' . DS . 'library' . DS);
define('PATH_VIEW',PATH . DS . 'app' . DS . 'view' . DS);
define('PATH_MODEL',PATH . DS . 'app' . DS . 'model' . DS);
define('PATH_CONTROLLER',PATH . DS . 'app' . DS . 'controller' . DS);

set_include_path(get_include_path() . ";" . implode(";",array(
	PATH . DS . 'app' . DS . 'controller' . DS,
	PATH . DS . 'app' . DS . 'model' . DS,
	PATH . DS . 'app' . DS . 'view' .DS,
	PATH . DS . 'app' . DS . 'classes' .DS
)))

function __autoload($className){

	$paths = explode(";", get_include_path());

	foreach($paths as $dir){
		if(file_exists($dir . $className . '.php')){
			require_once $dir . $className.'.php';	
		
	
	



define('DATABASE_HOST','mysql.bconsorcios.com.br');
define('DATABASE_USER','bconsorcios');
define('DATABASE_PASS','gledson2013');
define('DATABASE_NAME','bconsorcios');

global $dbh;

$dbh = new PDO("mysql:host=".DATABASE_HOST.";dbname=".DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set Errorhandling to Exception
if(!$dbh){
	die('Erro ao conectar no banco de dados.');


$dbh->exec("set names utf8");
