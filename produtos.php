<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cons&oacute;rcio Servopa Curitiba - Cons&oacute;rcio de Caminhão</title>

<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" /> 
<meta name="description" content="Consórcio Servopa Curitiba, consórcio de caminhão, Consórcio Servopa Curitiba" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<br>
		<section class="planos content wrap-content" style='margin-top:10px;'>
	<?php
					$sql = mysql_query("SELECT * FROM categorias_consorcios");
					while($row = mysql_fetch_array($sql)){
						if($row['id'] == 3){
							$sp = "SUA";
						}else{
							$sp = "SEU";
						}
						echo "
							<a href='{$base_url}categoria/{$row['id']}-{$row['slug']}'>
								<article class='box-planos{$row['id']}'>
								<span>{$sp}<span>
									<h1>{$row['nome']}</h1>
									<figure>
										<img src='dashboard/{$row['imagem']}' alt=''>
									</figure>
									<figcaption>CONHE&Ccedil;A</figcaption>
								</figure>
								<span class='thumb-hover'>
								<h2>{$row['nome']}</h2>
								<p>{$row['descricao']}</p>
								</span>
							</article>
						</a>
					";}
			?>
  			<div class="clear"></div>
 		</section><br>
							<div class="clear">	</div>
							<hr>
							<?php include 'includes/footer.php';?>
</body>
</html>