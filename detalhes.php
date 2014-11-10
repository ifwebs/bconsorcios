<!doctype html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cons&oacute;rcio de Carro|Cons&oacute;rcio de Imóvel|Cons&oacute;rcio de moto|Cons&oacute;rcio de Caminh&atilde;o</title>

<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" /> 
<meta name="description" content="Cons&oacute;rcio Servopa Curitiba, Cons&oacute;rcio de carro, Cons&oacute;rcio de imóvel, Cons&oacute;rcio de moto, Cons&oacute;rcio de caminh&atilde;o" />
<meta http-equiv="Content-Language" content="pt-br"/>
	<!-- <meta property="og:title" content="Cons&oacute;rcio Servopa Curitiba" />
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="Cons&oacute;rcio Servopa Curitiba, Cons&oacute;rcio de carro, Cons&oacute;rcio de imóvel, Cons&oacute;rcio de moto, Cons&oacute;rcio de caminh&atilde;o" />
	<meta property="og:url" content='http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>' />
	<meta property="og:image" content="<?php echo $base_url?>images/favicon.png" />
	<meta property="og:image:type" content="<?php echo $base_url?>image/jpeg" /> -->
<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>

<?php
	$id = $_GET['id'];

	$sql = mysql_query("SELECT * FROM consorcios
						INNER JOIN categorias_consorcios ON categorias_consorcios.id = consorcios.categoria_consorcio_id
						WHERE consorcios.id = $id");
	$res = mysql_fetch_array($sql);
	$categoria_consorcio_id = $res['categoria_consorcio_id'];

	/*$real = number_format($res['credito'], 2, ',', '.');
	$par = number_format($res['parcela'], 2, ',', '.');
	$par_com_seg = number_format($res['parcela_com_seguro'], 2, ',', '.');
	$par_red = number_format($res['parcela_reduzida'], 2, ',', '.');*/
?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="detalhes content wrap-content">
		<a href="javascript:window.history.go(-1)" class="voltar"><img src="<?php echo $base_url?>images/back.png">Voltar</a><br>
		<h1 style="font-size:32px;">DETALHES DO SEU CONS&Oacute;RCIO</h1>
		<ul class="info-det">
			<li><p class="p_ri">descri&ccedil;&atilde;o do bem:</p><p class="p_le"><?php echo $res['descricao_bem'];?></p><div class="clear"></div></li>
			<li><p class="p_ri">cr&eacute;dito:</p><strong class="p_le b">R$ <?php echo $res['credito'];?></strong><div class="clear"></div></li>
			<li><p class="p_ri">prazo:</p><p class="p_le"> <?php echo $res['prazo'];?></p><div class="clear"></div></li>
			<li><p class="p_ri">parcela:</p><strong class="p_le b">R$ <?php echo $res['parcela']?></strong><div class="clear"></div></li>
			<!-- <li><p class="p_ri">com seguro:</p><p class="p_le">R$ <?php echo $res['parcela_com_seguro']?></p><div class="clear"></div></li> -->
			<?php 
				if($categoria_consorcio_id == 2){
					echo "<li><p class='p_ri'>Parcela reduzida:</p><p class='p_le'>R$ {$res['parcela_reduzida']}</p><div class='clear'></div></li>";
				}
			?>
			<li><p class="p_ri">taxa de administra&ccedil;&atilde;o:</p><p class="p_le"><?php echo $res['taxa_administracao']?></p><div class="clear"></div></li>
			<li><p class="p_ri">fundo de reserva:</p><p class="p_le"><?php echo $res['fundo_reserva']?></p><div class="clear"></div></li>
		</ul>
		<figure class="info-img">
			<img src="../dashboard/<?php echo $res['imagem']?>" alt="">
		</figure>
		<div class="clear"></div>
        <h2>Caracter&iacute;ticas do grupo:</h2>
        <p><?php echo $res['obs'];?></p>
        </p>
        <ul class="details_final">
        	<li><img src="<?php echo $base_url?>images/cards.jpg">
        	<li><a href="<?php echo $base_url?>compra/<?php echo $id;?>" class="btn-pagar">Clique aqui para comprar</a>
        </ul>
        <div class="clear"></div>
        <ul class="compartilhe">
        	<li><p><b>Compartilhe:</b></p>
        	<li><a href="" class="icon_plus"></a>
        	<li><a href="javascript: void(0);" class="icon_face" onclick="window.open('http://www.facebook.com/sharer.php?u=http://fazer-site.net','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"></a>
        	<li><a href="" class="icon_t"></a>
        	<li><a href="mailto:contato@bconsorcios.com.br" class="icon_mail"></a>
        </ul>
		</section>
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>