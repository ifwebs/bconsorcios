<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['inserir']) && $_POST['inserir'] == 'cadastra'){

	$userfile_name = $_FILES['arquivo']['name'];
	$userfile_tmp = $_FILES['arquivo']['tmp_name'];
	$filename = basename($_FILES['arquivo']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));

	$titulo = htmlentities($_POST['titulo']);
	$legenda = htmlentities($_POST['legenda']);
	

	if (($file_ext == 'png') or ($file_ext == 'gif') or ($file_ext == 'jpg')){
		if (is_uploaded_file($userfile_tmp)){
			$dir = 'img/upload/banner/';
			$arquivo = $dir.uniqid().'.'.$file_ext; 
			if (move_uploaded_file($userfile_tmp,$arquivo)){
				$insere = mysql_query("INSERT INTO banners_home
									   VALUES ('', '$arquivo','','$titulo', '$legenda')");
				if ( $insere == '1' ){
					echo '<script>alert("Banner inserido com sucesso")</script>';
				}else{
					echo '<script>alert("Erro ao enviar o banner")</script>';
					unlink($arquivo);
				}
			}else{
				echo '<script>alert("Erro ao enviar o banner")</script>';
			}
		}else{
			echo '<script>alert("Erro ao enviar o banner")</script>';
		}
	}else{
		echo '<script>alert("Arquivo invalido")</script>';
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
						<h2><i class="icon-picture"></i> Inserir Banner</h2>
					</div>
					<div class="box-content">

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                                                      
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Título</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="titulo" required="required" />
							  </div>
							</div>
                            
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Legenda</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="legenda" name="legenda" rows="10"></textarea>
							  </div>
							</div>
                            
							<div class="control-group">
							  <label class="control-label" for="fileInput">Imagem</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="arquivo" required="required">
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