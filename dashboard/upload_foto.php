<?php
session_start(); 
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	unset($_SESSION['login']); 
	unset($_SESSION['senha']); 
	echo "<META http-equiv='refresh' content='0;URL=index.php'> ";
	exit();
} 
$logado = $_SESSION['login']; 
?>

<?php
require_once 'conexao.php';

$tipo = $_GET['t'];

if($tipo == 'cliente'){
	$nome = $_POST['nome'];
	$link = $_POST['link'];
	$logo = $_FILES['fileInput'];
	
	// Pega extensão da imagem
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logo["name"], $ext);
	// Gera um nome único para a imagem
	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	// Caminho de onde ficará a imagem
	$caminho_imagem = "img/cliente/" . $nome_imagem;
	// Faz o upload da imagem para seu respectivo caminho
	move_uploaded_file($logo["tmp_name"], $caminho_imagem);
	// Insere os dados no banco
	$sql = mysql_query("INSERT INTO cliente(nome, link, logo) VALUES ('{$nome}', '{$link}', '{$nome_imagem}')");
	// Se os dados forem inseridos com sucesso
	if ($sql){
		echo "<META http-equiv='refresh' content='0;URL=cliente.php?ok'> ";
		exit();
	}
	
}else{

$id_cliente = $_POST['id_cliente'];
$imagem = $_FILES['fileInput'];


    
// Pega extensão da imagem 
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);  
// Gera um nome único para a imagem
$nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
// Caminho de onde ficará a imagem 
$caminho_imagem = "img/cliente/" . $nome_imagem;   
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);  
// Insere os dados no banco 
$sql = mysql_query("INSERT INTO img_cliente(id_cliente,imagem) VALUES ('{$id_cliente}', '{$nome_imagem}')");  
   	    // Se os dados forem inseridos com sucesso 
   	    if ($sql){ 
			echo "<META http-equiv='refresh' content='0;URL=cadimg.php?id=$id_cliente&ok'> ";
			exit();   	    		
   	    } 
}   	    

?>