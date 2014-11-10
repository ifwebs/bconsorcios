<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['atualiza']) && $_POST['atualiza'] == 'atualizar'){

	$id = intval($_POST['id']);

	$userfile_name = $_FILES['arquivo']['name'];
	$userfile_tmp = $_FILES['arquivo']['tmp_name'];
	$filename = basename($_FILES['arquivo']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));

	$titulo = $_POST['titulo'];
	$legenda = $_POST['legenda'];
	$imagem = $_POST['imagem'];
	
	if ($userfile_name==''){
		
		$atualiza = mysql_query("UPDATE banners_home SET titulo = '$titulo', legenda = '$legenda'
							   WHERE id = '$id'");
		if ( $atualiza == '1' ){
			echo '<script>alert("Banner atualizado com sucesso")</script>';
		}else{
			echo '<script>alert("Erro ao atualizar o banner")</script>';
		}
		
	}else{

		if (($file_ext == 'png') or ($file_ext == 'gif') or ($file_ext == 'jpg')){
			if (is_uploaded_file($userfile_tmp)){
				$dir = 'img/upload/banner/';
				$arquivo = $dir.uniqid().'.'.$file_ext; 
				if (move_uploaded_file($userfile_tmp,$arquivo)){
					$atualiza = mysql_query("UPDATE banners_home SET arquivo = '$arquivo', titulo = '$titulo', legenda = '$legenda'
										   WHERE id = '$id'");
					if ( $atualiza == '1' ){
						echo '<script>alert("Banner atualizado com sucesso")</script>';
						unlink($imagem);
					}else{
						echo '<script>alert("Erro ao atualizar o banner")</script>';
						unlink($arquivo);
						/* $erro = mysql_error();
						echo "Ocorreu o seguinte erro: ", '"', $erro, '"'; */
					}
				}else{
					echo '<script>alert("Erro ao enviar o banner")</script>';
					unlink($arquivo);
				}
			}else{
				echo '<script>alert("Erro ao enviar o banner")</script>';
			}
		}else{
			echo '<script>alert("Arquivo invalido")</script>';
		}
	
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
						<h2><i class="icon-picture"></i> Editar Banner</h2>
					</div>
					<div class="box-content">
                    
                    <?php
					$id = intval($_GET['id']);
					$resultados = mysql_query("SELECT * FROM banners_home WHERE id = '$id'");
					if (mysql_num_rows($resultados) == 0){
						echo '<h3>Nenhuma banner encontrado</h3>';	
					}else{
						while ($res=mysql_fetch_array($resultados)) {
							$id = $res[0];
							$arquivo = $res[1];
							$titulo = $res[3];
							$legenda = $res[4];
						}
					}
					?>

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                                                      
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Título</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="titulo" required="required" value="<?php echo $titulo?>" />
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Legenda</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="legenda" name="legenda" rows="10"><?php echo $legenda;?></textarea>
							  </div>
							</div>
                            
							<div class="control-group">
							  <label class="control-label" for="fileInput">Imagem</label>
							  <div class="controls">
                                <?php echo ($arquivo!='')?'<img src="'.$arquivo.'" width="300" /><br/>':'';?>
								<input class="input-file uniform_on" id="fileInput" type="file" name="arquivo">
							  </div>
							</div> 
                            
							<div class="form-actions">
                              <input type="hidden" id="imagem" name="imagem" value="<?php echo $arquivo ?>" />
                              <input type="hidden" id ="id" name="id" value="<?php echo $id ?>" />
                              <input type="hidden" name="atualiza" value="atualizar" />
							  <button type="submit" class="btn btn-primary">Atualziar</button>
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