<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cons�rcio Servopa Curitiba - Cons�rcio de Carro</title>

<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" /> 
<meta name="description" content="Cons�rcio Servopa Curitiba, cons�rcio de carro, Cons�rcio Servopa Curitiba." />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="consorcio content wrap-content">
		<h1>O CONS�RCIO</h1><br>
		<?php 
			$sql = mysql_query("SELECT * FROM servopa");
			while ($row = mysql_fetch_array($sql)) {
				echo "<p>{$row['texto_servopa']}</p>";
			}
		?>
		<div class="clear"></div>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>