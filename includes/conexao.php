<?php
date_default_timezone_set('Brazil/East');
			
$hostname_config="localhost";
$database_config="bconsorcios";
$username_config="root";
$password_config="";

$conexao = mysql_connect("$hostname_config","$username_config","$password_config") or die ("Erro ao conectar a Base de dados");
$db = mysql_select_db("$database_config") or die ("Erro ao selecionar a base de dados");
					
?>