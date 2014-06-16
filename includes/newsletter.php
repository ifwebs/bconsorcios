<?php
require_once 'conexao.php';

$email = $_POST['email'];

$sql = mysql_query("INSERT INTO newsletter (nome, email, ativo) VALUES ('', '$email', 's')");
?>