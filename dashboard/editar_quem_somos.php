<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['atualiza']) && $_POST['atualiza'] == 'atualizar'){

	$id = intval($_POST['id']);
	$texto_quem = $_POST['editor'];
	
	
	$atualiza = mysql_query("UPDATE quem_somos SET texto_quem = '$texto_quem'
						   WHERE id_quem = '$id'");
	if ( $atualiza == '1' ){
		echo '<script>alert("Quem Somos atualizado com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao atualizar Quem Somos")</script>';
	}
		
}	

?>

		<div class="container-fluid">
		<div class="row-fluid">
				
			<?php include 'menu.php';?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Atenção!</h4>
					<p>VocÃª precisa ter o <a href="http://pt.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> ativado para usar este site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-picture"></i> Editar Quem Somos</h2>
					</div>
					<div class="box-content">
                    
                    <?php
					$resultados = mysql_query("SELECT * FROM quem_somos WHERE id_quem = 1");
					if (mysql_num_rows($resultados) == 0){
						echo '<h3>Nenhum registro encontrado</h3>';	
					}else{
						while ($res=mysql_fetch_array($resultados)) {
							$id = $res[0];
							$texto_quem = $res[1];
						}
					}
					?>

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Quem Somos</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor" name="editor" rows="10"><?php echo nl2br($texto_quem)?></textarea>
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