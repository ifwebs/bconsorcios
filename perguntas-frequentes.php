<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consórcio Servopa Curitiba</title>

<meta name="keywords" content="" /> 
<meta name="description" content="" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
<?php 
	$sql = mysql_query("SELECT * FROM perguntas_frequentes");
?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="perguntas content">
		<h1>Perguntas Frequentes</h1>	
		
		<div id="accordion">
		<?php 
			while($row = mysql_fetch_array($sql)){
				echo "
						<section id='item{$row['id']}' class='ac_hidden'>
						    <p class='pointer'>&#9654;</p><h1><a href='#'>{$row['pergunta']}</a></h1>
						    <p>{$row['resposta']}</p>
		  				</section>
					";
			}
		?>
		  
		</div>
		
		<div class="clear">	</div>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>