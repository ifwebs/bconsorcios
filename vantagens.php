<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cons�rcio Servopa Curitiba</title>

<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" /> 
<meta name="description" content="Cons�rcio Servopa Curitiba, cons�rcio de carro, cons�rcio de im�vel, cons�rcio de moto, cons�rcio de caminh�o" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="lista content wrap-content">
		<article class="texto">
		<h1>VANTAGENS</h1>
			<p style="color: #a3a3a3;font-family: "Open Sans";font-size: 14px;line-height: 18px;">Conhe�a algumas vantagens do Cons�rcio Servopa e realize o seu plano com a satisfa��o e seguran�a que voc� merece:</p><br><br>
			
			<?php 
				$sql = mysql_query("SELECT * FROM vantagens");
				while ($row = mysql_fetch_array($sql)) {
					echo "<h2>- {$row['titulo_vantagem']}</h2>";
					echo "<p>{$row['descricao_vantagem']}</p><br>";
				}
			?>
<!-- <img src='images/ok.png' width='15px;' style='padding-right:5px;'> -->
		</article>
		
		<div class="clear">	</div>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>