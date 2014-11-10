<?php 
require_once 'config.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'HomeController';

if(class_exists($controller,true)){
	new $controller();
}else
	new ErroController();

?>