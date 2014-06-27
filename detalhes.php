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
	$id = $_GET['id'];
	
	$sql = mysql_query("SELECT * FROM consorcios WHERE id = $id");
	$res = mysql_fetch_array($sql);
	$real = number_format($res['credito'], 2);
?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="detalhes content">
		<a href="javascript:window.history.go(-1)" class="voltar"><img src="<?php echo $base_url?>images/back.png">Voltar</a><br>
		<h1>Detalhes do seu consórcio</h1>
		<ul>
			<li><p class="p_ri">descrição do bem:</p><p class="p_le"><?php echo $res['descricao_bem'];?></p><div class="clear"></div>
			<li><p class="p_ri">crédito:</p><p class="p_le">R$: <?php echo $real;?></p><div class="clear"></div>
			<li><p class="p_ri">parcela com seguro:</p><p class="p_le">R$: <?php echo $res['parcela_com_seguro']?></p><div class="clear"></div>
			<li><p class="p_ri">taxa de administração:</p><p class="p_le"><?php echo $res['taxa_administracao']?></p><div class="clear"></div>
			<li><p class="p_ri">fundo de reserva:</p><p class="p_le"><?php echo $res['fundo_reserva']?></p><div class="clear"></div>
		</ul>
        <h2>Caracteríticas do grupo:</h2>    
        <p><?php echo nl2br($res['obs']);?></p>
        </p>
        <ul class="details_final">
        	<li><img src="<?php echo $base_url?>images/cards.png">
        	<li><a href="<?php echo $base_url?>compra/<?php echo $id;?>" class="comprar">Pagar</a>
        </ul>
        <ul class="compartilhe">
        	<li><p><b>Compartilhe:</b></p>
        	<li><a href="" class="icon_plus"></a>
        	<li><a href="" class="icon_face"></a>
        	<li><a href="" class="icon_t"></a>
        	<li><a href="" class="icon_mail"></a>
        </ul>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>