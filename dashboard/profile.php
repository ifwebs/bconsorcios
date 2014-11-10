<?php
session_start(); 
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	unset($_SESSION['login']); 
	unset($_SESSION['senha']); 
	header('location:index.php'); 
} 
$logado = $_SESSION['login']; 
?>

<?php
	require_once 'conexao.php'; 
	$sql = mysql_query("SELECT senha FROM usuario WHERE login = '$logado'");
	while($senha = mysql_fetch_assoc($sql)){
		$pass = $senha['senha'];
	}
?>

<?php include 'header.php';?>
		<div class="container-fluid">
		<div class="row-fluid">
				
			<?php include 'menu.php';?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Atenção!</h4>
					<p>Você precisa ter o <a href="http://pt.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> ativado para usar este site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-pencil"></i> Usuário: <?php echo $logado ?></h2>
					</div>
					<div class="box-content">
						<h1>Alterar senha</h1>
						<p>Digite a nova senha e clique em alterar.</p>
						<?php include 'mensagens.php';?>
						<form class="form-horizontal" action="alterasenha.php" method="post">
							<div class="input-prepend">
								<input type="hidden" id="login" name="login" value="<?php echo $logado;?>">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span6" name="senha" id="senha" type="password" value="<?php echo $pass;?>" />
								<button type="submit" class="btn btn-primary">Alterar</button>
							</div>
						</form>	
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		
	</div><!--/.fluid-container-->

	<?php include 'footer.php';?>