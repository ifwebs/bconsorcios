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
	$slug = $_GET['slug'];
	$id = $_GET['id'];
	
	$cat = mysql_query("SELECT * FROM categorias_consorcios WHERE id = $id");
	$nome = mysql_fetch_array($cat);
	
	$sql = mysql_query("SELECT * FROM consorcios WHERE categoria_consorcio_id = $id");
?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="lista content">
		<h1><?php echo $nome['nome'];?></h1>	
		<!-- <article class="texto">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
			Curabitur rutrum, nibh eget aliquet aliquet, risus lacus posuere neque, 
			quis facilisis erat orci eu dolor. Integer tellus est, venenatis 
			sed leo in, scelerisque dictum erat.</p>
		</article> -->
		<article class="icon_car">
			<ul>
				<li><a href="<?php echo $base_url?>categoria/1-automovel" class="icon_carro"></a>
				<li><a href="<?php echo $base_url?>categoria/2-imovel" class="icon_house"></a>
				<li><a href="<?php echo $base_url?>categoria/3-moto" class="icon_bike"></a>
				<li><a href="<?php echo $base_url?>categoria/4-caminhao" class="icon_van"></a>
			</ul>
		</article>
		<div class="clear">	</div>
		<div class="tabelaplanos" >
                <table >
                    <tr>
                        <td>Crédito</td>
                        <td>Prazo</td>
                        <td>Parcela</td>
                        <td>Detalhes/Comprar</td>
                    </tr>
                    
                    <?php 
                    	while($row = mysql_fetch_array($sql)){
                    		$real = number_format($row['credito'], 2);
                    		echo "
                    				<tr>
				                       <td>R$ $real</td>
				                       <td>{$row['prazo']}</td>
				                       <td>R$ {$row['parcela']}</td>
				                       <td><a href='{$base_url}detalhes/{$row['id']}' class='comprar'>Comprar</a></td>
                    				</tr>
                    			";
                    	}
                    ?>
                </table>
            </div>
            
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>