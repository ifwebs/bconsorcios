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

	$descricao = strip_tags($_POST['editor1']);
	$descricao_details = strip_tags($_POST['editor']);
	$imagem = $_POST['imagem'];
	
	if ($userfile_name==''){
		
		$atualiza = mysql_query("UPDATE categorias_consorcios SET descricao = '$descricao', descricao_details = '$descricao_details'
							   WHERE id = '$id'");
		if ( $atualiza == '1' ){
			echo '<script>alert("Categoria atualizada com sucesso")</script>';
		}else{
			echo '<script>alert("Erro ao atualizar a categoria")</script>';
		}
		
	}else{

		if (($file_ext == 'png') or ($file_ext == 'gif') or ($file_ext == 'jpg')){
			if (is_uploaded_file($userfile_tmp)){
				$dir = 'img/upload/categoria/';
				$arquivo = $dir.uniqid().'.'.$file_ext; 
				if (move_uploaded_file($userfile_tmp,$arquivo)){
					$atualiza = mysql_query("UPDATE categorias_consorcios SET imagem = '$arquivo', descricao = '$descricao', descricao_details = '$descricao_details'
										   WHERE id = '$id'");
					if ( $atualiza == '1' ){
						echo '<script>alert("Categoria atualizada com sucesso")</script>';
						unlink($imagem);
					}else{
						echo '<script>alert("Erro ao atualizar a categoria")</script>';
						unlink($arquivo);
						/* $erro = mysql_error();
						echo "Ocorreu o seguinte erro: ", '"', $erro, '"'; */
					}
				}else{
					echo '<script>alert("Erro ao enviar a imagem")</script>';
					unlink($arquivo);
				}
			}else{
				echo '<script>alert("Erro ao enviar a imagem")</script>';
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
						<h2><i class="icon-picture"></i> Editar Categoria</h2>
					</div>
					<div class="box-content">
                    
                    <?php
					$id = intval($_GET['id']);
					$resultados = mysql_query("SELECT * FROM categorias_consorcios WHERE id = '$id'");
					if (mysql_num_rows($resultados) == 0){
						echo '<h3>Nenhuma categoria encontrada</h3>';	
					}else{
						while ($res=mysql_fetch_array($resultados)) {
							$id = $res[0];
							$nome = $res[1];
							$arquivo = $res[5];
							$descricao = $res[6];
							$descricao_details = $res[7];
						}
					}
					?>

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                               <h2><?php echo $nome;?></h2>                       
                            <div class="control-group">
							  <label class="control-label" for="textarea2">Descrição</label>
							  <div class="controls">
								<textarea  cols="80" id="editor1" name="editor1" rows="10" onkeyup="limitaTextarea(this.value)"><?php echo nl2br($descricao)?></textarea>
							  	<br>Campo (caracteres restantes: <span id="cont">250</span>)
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="textarea2">Descrição Detalhes</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor" name="editor" rows="10"><?php echo nl2br($descricao_details)?></textarea>
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