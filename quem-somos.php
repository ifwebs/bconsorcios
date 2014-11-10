<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consórcio Servopa Curitiba - Consórcio de Imóvel</title>

<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" /> 
<meta name="description" content="Consórcio Servopa Curitiba, consórcio de imóvel, Consórcio Servopa Curitiba" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="lista content wrap-content">
		<h1>QUEM SOMOS</h1><br><br>
		<article class="texto">
		<?php 
			$sql = mysql_query("SELECT * FROM quem_somos");
			while ($row = mysql_fetch_array($sql)) {
				echo "<p>{$row['texto_quem']}</p>";
			}
		?>
		</article>
		
		<div class="clear">	</div>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>