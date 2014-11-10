<?php
session_start();

function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}

$login = $_POST['login'];
$senha = md5($_POST['senha']);

require 'conexao.php';

$verifica_login = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' AND ativo = 's' LIMIT 1");

if(mysql_num_rows($verifica_login)==1){
	$_SESSION['login'] = $login;
  	$_SESSION['senha'] = $senha;
	echo '<script language= "JavaScript">location.href="admin.php"</script>'."\n";
}else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	echo '<script language= "JavaScript">location.href="index.php?errologin"</script>'."\n";
}

?>