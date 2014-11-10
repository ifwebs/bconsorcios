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
	
	$categoria = $_POST['categoria'];
	$descricao = $_POST['descricao'];
	$nome_produto = $_POST['nome_produto'];
	$nome_consorcio = $_POST['nome_consorcio'];
	$credito = $_POST['credito'];
	$parcela = $_POST['parcela'];
	$parcela_com_seguro = $_POST['parcela_com_seguro'];
	$parcela_reduzida = $_POST['parcela_reduzida'];
	$parcela_reduzida_com_seguro = $_POST['parcela_reduzida_com_seguro'];
	$prazo = $_POST['prazo'];
	$taxa = $_POST['taxa'];
	$fundo = $_POST['fundo'];
	$editor1 = $_POST['editor1'];
	$editor2 = $_POST['editor2'];
	$editor3 = $_POST['editor3'];
	$editor4 = $_POST['editor4'];
	$publicado = intval($_POST['publicado']);
	
	$imagem = $_POST['imagem'];
	
	if ($userfile_name==''){
	
		$atualiza = mysql_query("UPDATE consorcios 
							SET categoria_consorcio_id = '$categoria',
							descricao_bem = '$descricao',
							credito = '$credito',
							parcela = '$parcela',
							prazo = '$prazo',
							parcela_com_seguro = '$parcela_com_seguro',
							parcela_reduzida = '$parcela_reduzida',
							parcela_reduzida_com_seguro = '$parcela_reduzida_com_seguro',
							fundo_reserva = '$fundo',
							taxa_administracao = '$taxa',
							obs= '$editor1',
							nome_produto = '$nome_produto',
							nome_consorcio = '$nome_consorcio',
							obs_prod = '$editor2',
							obs_pquadr = '$editor3',
							obs_squadr = '$editor4',
							publicado = '$publicado'
							 WHERE id = '$id'");
		
		if ( $atualiza == '1' ){
			echo '<script>alert("Consórcio atualizado com sucesso")</script>';
		}else{
			echo '<script>alert("Erro ao atualizar o consórcio")</script>';
		}
	
	}else{
	
		if (($file_ext == 'png') or ($file_ext == 'gif') or ($file_ext == 'jpg')){
			if (is_uploaded_file($userfile_tmp)){
				$dir = 'img/upload/sub-cat/';
				$arquivo = $dir.uniqid().'.'.$file_ext;
				if (move_uploaded_file($userfile_tmp,$arquivo)){
					$atualiza = mysql_query("UPDATE consorcios 
							SET categoria_consorcio_id = '$categoria',
							descricao_bem = '$descricao',
							credito = '$credito',
							parcela = '$parcela',
							prazo = '$prazo',
							parcela_com_seguro = '$parcela_com_seguro',
							parcela_reduzida = '$parcela_reduzida',
							parcela_reduzida_com_seguro = '$parcela_reduzida_com_seguro',
							fundo_reserva = '$fundo',
							taxa_administracao = '$taxa',
							obs= '$editor1',
							imagem_produto = '$arquivo',
							nome_produto = '$nome_produto',
							nome_consorcio = '$nome_consorcio',
							obs_prod = '$editor2',
							obs_pquadr = '$editor3',
							obs_squadr = '$editor4',
							publicado = '$publicado'
							 WHERE id = '$id'");
					if ( $atualiza == '1' ){
						echo '<script>alert("consórcio atualizado com sucesso")</script>';
						unlink($imagem);
					}else{
						echo '<script>alert("Erro ao atualizar o consórcio")</script>';
						unlink($arquivo);
						/* $erro = mysql_error();
							echo "Ocorreu o seguinte erro: ", '"', $erro, '"'; */
					}
				}else{
					echo '<script>alert("Erro ao enviar o consórcio")</script>';
					unlink($arquivo);
				}
			}else{
				echo '<script>alert("Erro ao enviar o consórcio")</script>';
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
					<h4 class="alert-heading">Aten&ccedil;&atilde;o!</h4>
					<p>Você precisa ter o <a href="http://pt.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> ativado para usar este site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-plane"></i> Editar Cons&oacute;rcio</h2>
					</div>
					<div class="box-content">
                    
                    <?php
					$id = intval($_GET['id']);
					$resultados = mysql_query("SELECT * FROM consorcios WHERE id = '$id'");
					if (mysql_num_rows($resultados) == 0){
						echo '<h3>Nenhum cons&oacute;rcio encontrado</h3>';	
					}else{
						while ($res=mysql_fetch_array($resultados)) {
							$id = $res[0];
							$id_categoria = $res[1];
							$descricao  = $res[2];
							$credito = $res[3];
							$parcela = $res[4];
							$prazo = $res[5];
							$parcela_com_seguro = $res[7];
							$parcela_reduzida = $res[9];
							$parcela_reduzida_com_seguro = $res[10];
							$fundo = $res[12];
							$taxa = $res[13];
							$lance_diluido = $res[19];
							$editor1 = $res[21];
							$arquivo = $res[24];
							$nome_produto = $res[25];
							$nome_consorcio = $res[26];
							$editor2 = $res[27];
							$editor3 = $res[28];
							$editor4 = $res[29];
							$publicado = $res[30];
						}
					}
					?>

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                          
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Grupo</label>
                                <div class="controls">
									<?php //lista categorias
                                    $consultas = mysql_query("SELECT * from categorias_consorcios ORDER BY nome ASC");
                                    if (mysql_num_rows($consultas) == 0){
                                    }else{
                                        echo '<select name="categoria" required="required">';
                                        while ($res=mysql_fetch_array($consultas)) {
                                            echo '<option value="'.$res[0].'" '.( ($res[0]==$id_categoria)?'selected="selected"':'' ).'>'.$res[1].'</option>';
                                        }
                                        echo '</select><br/>';
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput">Imagem</label>
							  <div class="controls">
                                <?php echo ($arquivo!='')?'<img src="'.$arquivo.'" width="300" /><br/>':'';?>
								<input class="input-file uniform_on" id="fileInput" type="file" name="arquivo">
							  </div>
							</div> 
                            
                            <div class="control-group">
                              <label class="control-label" for="selectError3">Descri&ccedil;&atilde;o do Bem</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="descricao" required="required" value="<?php echo $descricao;?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Nome do Produto</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="nome_produto"  value="<?php echo $nome_produto;?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Nome do Consórcio</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="nome_consorcio"  value="<?php echo $nome_consorcio;?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Cr&eacute;dito R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="credito" required="required" value="<?php echo $credito?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela" required="required" value="<?php echo $parcela?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela com Seguro R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela_com_seguro" required="required" value="<?php echo $parcela_com_seguro?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela Reduzida R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela_reduzida" required="required" value="<?php echo $parcela_reduzida?>"/>
							  </div>
							</div>

							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela Reduzida com seguro R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela_reduzida_com_seguro" required="required" value="<?php echo $parcela_reduzida_com_seguro?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Prazo</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="prazo" required="required" value="<?php echo $prazo?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Taxa Admin.</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="taxa" required="required" value="<?php echo $taxa?>"/>
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Fundo Reserva</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="fundo" required="required" value="<?php echo $fundo?>"/>
							  </div>
							</div>
							
                            
                            <div class="control-group">
							  <label class="control-label" for="textarea2">CARACTERISTICAS DO GRUPO</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><?php echo $editor1?></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">OBSERVAÇÕES</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor2" name="editor2" rows="10"><?php echo $editor2?></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">OBS 1º QUADRO</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor3" name="editor3" rows="10"><?php echo $editor3?></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">OBS 2º QUADRO</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor4" name="editor4" rows="10"><?php echo $editor4?></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">Publicado</label>
							  <div class="controls">
                                <select name="publicado">
                                  <option value="0" <?php echo ($publicado==0)?'selected="selected"':'' ?>>N&atilde;o</option>
                                  <option value="1" <?php echo ($publicado==1)?'selected="selected"':'' ?>>Sim</option>
                                </select>
							  </div>
							</div> 
                            
							<div class="form-actions">
							<input type="hidden" id="imagem" name="imagem" value="<?php echo $arquivo ?>" />
                              <input type="hidden" id ="id_cidade" name="id" value="<?php echo $id ?>" />
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