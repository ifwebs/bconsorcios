<?php
require_once 'conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = mysql_query("UPDATE usuario SET senha = '$senha' WHERE login = '$login'");

if($sql){
	header("location:profile.php?alterado");
}else{
	header("location:profile.php?erro");
}

?>