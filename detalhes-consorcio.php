<?php require 'includes/conexao.php';?>
	<?php
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM consorcios
		INNER JOIN categorias_consorcios ON categorias_consorcios.id = consorcios.categoria_consorcio_id
		WHERE consorcios.id = $id");
	$res = mysql_fetch_array($sql);
	$categoria_consorcio_id = $res['categoria_consorcio_id'];
	?>
<!doctype html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="pt-BR">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Cons&oacute;rcio de Carro | Cons&oacute;rcio de Im&oacute;vel | Cons&oacute;rcio de moto | Cons&oacute;rcio de Caminh&atilde;o</title>
	<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" />
	<meta name="description" content="Cons&oacute;rcio Servopa Curitiba, Cons&oacute;rcio de carro, Cons&oacute;rcio de im&oacute;vel, Cons&oacute;rcio de moto, Cons&oacute;rcio de caminh&atilde;o" />
	<meta http-equiv="Content-Language" content="pt-br"/>
	<meta property="og:title" content="Cons&oacute;rcio de <?php echo $res['descricao_bem'];?>" />
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="Carta de cr&eacute;dito para esse ve&iacute;culo por apenas R$ <?php echo $res['credito'];?>" />
	<meta property="og:url" content='http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>' />
	<meta property="og:image" content="<?php echo $base_url?>dashboard/<?php echo $res['imagem_produto']?>" />
	<meta property="og:image:type" content="<?php echo $base_url?>image/jpeg" />
	<?php include 'includes/head.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="detalhes content wrap-content">
			<a href="javascript:window.history.go(-1)" class="voltar"><img src="<?php echo $base_url?>images/img_prev.png">Voltar</a><br>
			<div class="inf-destaque">
				<p>Basta o pagamento da primeira parcela e o plano est&aacute; contratado</p>
			</div>
			<!-- /.inf-destaque -->
			<h1 style="font-size:32px;">DETALHES DO SEU CONS&Oacute;RCIO</h1>
			<div class="clear"></div>
			<!-- /.clear -->
			<div class="info-img">
				<img src="<?php echo $base_url?>dashboard/<?php echo $res['imagem_produto']?>" alt="">
				<div class="clear"></div>
				<!-- /.clear -->
				<div class="dicas1">
					<p><?php echo $res['obs_pquadr']?></p>
				</div>
				<!-- /.dicas1 -->
				<div class="dicas2">
					<p><?php echo $res['obs_squadr']?></p>
				</div>
				<!-- /.dicas2 -->
			</div>
			<div class="inf-produto">
				<ul class="info-det">
					<li><p class="p_ri">descri&ccedil;&atilde;o do bem</p><p class="p_le"><?php echo $res['descricao_bem'];?></p><div class="clear"></div></li>
					<li><p class="p_ri">plano</p><strong class="p_le b">R$ <?php echo $res['credito'];?></strong><div class="clear"></div></li>
					<li><p class="p_ri">prazo</p><p class="p_le"><?php echo $res['prazo'];?></p><div class="clear"></div></li>
					<li><p class="p_ri">parcela</p><strong class="p_le b"><?php echo $res['parcela'];?></strong><div class="clear"></div></li>
					<!-- <li><p class="p_ri">com seguro</p><p class="p_le">R$ <?php echo $res['parcela_com_seguro']?></p><div class="clear"></div></li> -->
					<?php
					if($categoria_consorcio_id == 2){
						echo "<li><p class='p_ri'>Parcela reduzida</p><p class='p_le'>R$ {$res['parcela_reduzida']}</p><div class='clear'></div></li>";
					}
					?>
					<li><p class="p_ri">taxa de administra&ccedil;&atilde;o</p><p class="p_le"><?php echo $res['taxa_administracao']?></p><div class="clear"></div></li>
					<li><p class="p_ri">fundo de reserva</p><p class="p_le"><?php echo $res['fundo_reserva']?></p><div class="clear"></div></li>
				</ul>
				<div class="clear"></div>
				<!-- /.clear -->
				<ul class="details_final">
					<li><a href="<?php echo $base_url?>compra/<?php echo $id;?>" class="btn-pagar">Clique aqui para comprar</a></li>
					<li><img src="<?php echo $base_url?>images/cards.jpg"></li>
				</ul>
			</div>
			<div class="div-bd"></div>
			<!-- /.div-bd -->
			<!-- /.inf-produto -->
			<div class="inf-grupo">
				<div class="clear"></div>
				<h2>Caracter&iacute;ticas do grupo</h2>
				<p><?php echo $res['obs'];?></p>
			</div>
			<!-- /.inf-grupo -->
			<div class="div-bd"></div>
			<!-- /.div-bd -->
			<div class="inf-obs">
				<strong><?php echo $res["obs_prod"];?></strong>
			</div>
			<!-- /.inf-obs -->
			<div class="clear"></div>
			<!-- /.clear -->
			<a href="<?php echo $base_url?>compra/<?php echo $id;?>" class="btn-pagar2">Clique aqui para comprar</a>
			<div class="clear"></div>
			<ul class="compartilhe">
				<li><p><b>Compartilhe:</b></p>
					<?php
					$server = $_SERVER['SERVER_NAME']; 
					$endereco = $_SERVER ['REQUEST_URI'];
					?>
					<li><a href="https://plus.google.com/share?url=http://<?php echo $server.$endereco; ?>" class="icon_plus"></a>
						<li><a href="javascript: void(0);" class="icon_face" onclick="window.open('http://www.facebook.com/sharer.php?u=http://<?php echo $server.$endereco; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"></a>
							<li><a href="https://twitter.com/share?url=http://<?php echo $server.$endereco; ?>" class="icon_t twitter-share-button"></a>
								<li><a href="mailto:contato@bconsorcios.com.br" class="icon_mail"></a>
								</ul>
							</section>
							<hr>
							<?php include 'includes/footer.php';?>
						</body>
						</html>