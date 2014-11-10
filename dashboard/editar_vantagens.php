<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['atualiza']) && $_POST['atualiza'] == 'atualizar'){
	
	$id = intval($_POST['id']);
	$titulo_vantagem = $_POST['titulo_vantagem'];
	$descricao_vantagem = $_POST['editor1'];

	$atualiza = mysql_query("UPDATE vantagens 
							SET titulo_vantagem = '$titulo_vantagem',descricao_vantagem = '$descricao_vantagem'
							 WHERE id_vantagem = '$id'");
							 
	if ( $atualiza == '1' ){
		echo "<script>alert('Vantagem atualizada com sucesso.')</script>";
	}else{
		echo "<script>alert('Erro ao atualizar a Vantagem!')</script>";
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
						<h2><i class="icon-plane"></i> Editar Vantagem</h2>
					</div>
					<div class="box-content">
                    
                    <?php
					$id = intval($_GET['id']);
					$resultados = mysql_query("SELECT * FROM vantagens WHERE id_vantagem = '$id'");
					if (mysql_num_rows($resultados) == 0){
						echo '<h3>Nenhuma vantagem encontrada</h3>';	
					}else{
						while ($res=mysql_fetch_array($resultados)) {
							$id = $res[0];
							$titulo_vantagem = $res[1];
							$descricao_vantagem  = $res[2];
						}
					}
					?>

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                          
                            <div class="control-group">
							  <label class="control-label" for="textarea2">Título</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="titulo_vantagem"  value="<?php echo $titulo_vantagem; ?>"/>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Descrição</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo nl2br($descricao_vantagem)?></textarea>
							  </div>
							</div>  
                            
							<div class="form-actions">
                              <input type="hidden" id ="id" name="id" value="<?php echo $id ?>" />
                              <input type="hidden" name="atualiza" value="atualizar" />
							  <button type="submit" class="btn btn-primary">Atualizar</button>
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