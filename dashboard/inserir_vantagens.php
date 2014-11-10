<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['inserir']) && $_POST['inserir'] == 'cadastra'){
	
	$titulo_vantagem = $_POST['titulo_vantagem'];
	$descricao_vantagem = $_POST['editor1'];
	
	$insere = mysql_query("INSERT INTO vantagens VALUES ('', '$titulo_vantagem', '$descricao_vantagem')");
	
	if ( $insere == '1' ){
		echo "<script>alert('Vantagem inserida com sucesso.')</script>";
	}else{
		/* $erro = mysql_error();
		echo "Ocorreu o seguinte erro: ", '"', $erro, '"'; */
		echo "<script>alert('Erro ao inserir a vantegem!')</script>";
	}
}
?>

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
						<h2><i class="icon-plane"></i> Inserir Vantagens</h2>
					</div>
					<div class="box-content">

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                          
                          <div class="control-group">
							  <label class="control-label" for="textarea2">Título</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="titulo_vantagem"  />
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Descrição</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"></textarea>
							  </div>
							</div>  
                            
                            
							<div class="form-actions">
                               <input type="hidden" name="inserir" value="cadastra" />
							  <button type="submit" class="btn btn-primary">Inserir</button>
							  <button type="reset" class="btn">Cancelar</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div>
			</div>
				
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		
	</div><!--/.fluid-container-->

	
	
	<?php include 'footer.php';?>