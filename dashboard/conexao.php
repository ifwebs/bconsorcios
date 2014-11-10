<?php
	//date_default_timezone_set('Brazil/East');
		
	/*$hostname_config="localhost";
	$database_config="bconsorcios";
	$username_config="root";
	$password_config="";
	
	$conexao = mysql_connect("$hostname_config","$username_config","$password_config") or die ("Erro ao conectar a Base de dados");
	$db = mysql_select_db("$database_config") or die ("Erro ao selecionar a base de dados");*/
	// conecta ao banco de dados
$link = mysql_connect('mysql.bconsorcios.com.br', 'bconsorcios', 'gledson2013');

if (!$link) {
    die('Não conseguiu conectar: ' . mysql_error());
}

// seleciona o banco bconsorcios
$db_selected = mysql_select_db('bconsorcios', $link);

if (!$db_selected) {
    die ('Não pode selecionar o banco bconsorcios : ' . mysql_error());
}
?>