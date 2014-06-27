<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consórcio Servopa Curitiba</title>

<meta name="keywords" content="" /> 
<meta name="description" content="" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<br>
		<section class="planos content">
			<?php 
				$sql = mysql_query("SELECT * FROM categorias_consorcios");
				while($row = mysql_fetch_array($sql)){
					echo "
						<a href='{$base_url}categoria/{$row['id']}-{$row['slug']}'>
						    <article class='box-planos{$row['id']}'>
						     <h1>{$row['nome']}</h1>
						     <figure>
						      <img src='images/thumb-1.jpg' alt=''>
						     </figure>
						    </figure>
						    <span class='thumb-hover'>
						    <h2>{$row['nome']}</h2>
						    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias facilis quo nisi suscipit, id et.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias facilis quo nisi suscipit, id et.</p>
						    </span>
						   </article>
		  				</a>
					";
				}
			?>
  			<div class="clear"></div>
 		</section>
							<div class="clear">	</div>
							<hr>
							<?php include 'includes/footer.php';?>
</body>
</html>