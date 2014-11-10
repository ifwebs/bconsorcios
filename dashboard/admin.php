<?php
session_start(); 
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	unset($_SESSION['login']); 
	unset($_SESSION['senha']); 
	header('location:index.php'); 
} 
$logado = $_SESSION['login']; 
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
						<h2><i class="icon-home"></i> Bem vindo <?php echo $logado ?></h2>
					</div>
					<div class="box-content">
						<h1>Bem vindo ao seu painel de administração</h1>
						<p>Para navegar, utilize o menu a esquerda.</p>
	
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