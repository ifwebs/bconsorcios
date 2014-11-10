<!doctype html>
<html lang="pt-br">
	<head>
		<title>Consorcio Carro, Consorcio Fiat, Consorcio Volkswagen, Consorcio Chevrolet • Consorcio moto, Consorcio Honda • Consorcio imoveis • Consorcio Caminhoes, Consorcio Scania, Consorcio Iveco, Consorcio Volvo, Consorcio Mercedes • B Consorcios</title>
		<meta name="keywords" content="Consorcio Carro - Consorcio Fiat, Consorcio Volkswagen, Consorcio Chevrolet, Consorcio moto, Consorcio Honda, Consorcio imoveis, Consorcio Caminhoes, Consorcio Scania, Consorcio Iveco, Consorcio Volvo, Consorcio Mercedes, Consorcio Curitiba, B Consorcios" />
		<meta name="description" content="TODOS OS TIPOS DE CONSÓRCIOS • Fácil, sem burocracia e com a segurança do Grupo Servopa." />
		<?php include 'includes/head.php';?>
		<?php require 'includes/conexao.php';?>
	</head>
	<body>
		<div class="all">
			<?php include 'includes/header.php';?>
			<div class="clear"></div>
			<?php include 'includes/banner.php';?>
			<section class="planos content wrap-content">
				<?php
					$sql = mysql_query("SELECT * FROM categorias_consorcios");
					while($row = mysql_fetch_array($sql)){
						if($row['id'] == 1){
							$name = "carros";
							$oculto = "Consorcio fiat, Consorcio volkswagen, Consorcio chevrolet, Consorcio ford, Consorcio carro";
						}
						if ($row['id'] == 2){
							$name = "imóveis";
							$oculto = "Consorcio imoveis, Consorcio casa ";
						}
						if ($row['id'] == 3){
							$name = "Honda";
							$oculto = "Consorcio Honda, Moto consorcio ";
						}
						if ($row['id'] == 4){
							$name = "Caminhonetes";
							$oculto = "Consorcio strada , Consorcio saveiro, Consorcio s10, Consorcio hilux";
						}
						echo "
							<a href='{$base_url}categoria/{$row['id']}-{$row['slug']}'>
								<article class='box-planos{$row['id']}'>
								<span>Consórcio de<span>
									<h1>$name</h1>
									<h1 class='txt'>$oculto</h1>
									<figure>
										<img src='dashboard/{$row['imagem']}' alt=''>
									</figure>
									<figcaption>CONHE&Ccedil;A</figcaption>
								</figure>
								<span class='thumb-hover'>
								<h2>$name</h2>
								<p>" .nl2br($row['descricao']). "</p>
								</span>
							</article>
						</a>
					";}
			?>
			<div class="clear"></div>
		</section>
		<div class="clear">	</div>
		<hr>
		<?php include 'includes/footer.php';?>
	</body>
</html>