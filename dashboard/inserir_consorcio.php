<?php
require_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['inserir']) && $_POST['inserir'] == 'cadastra'){
	
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
	$lance_diluido = $_POST['lance_diluido'];
	$editor1 = $_POST['editor1'];
	$editor2 = $_POST['editor2'];
	$editor3 = $_POST['editor3'];
	$editor4 = $_POST['editor4'];
	$publicado = intval($_POST['publicado']);
	
	if (($file_ext == 'png') or ($file_ext == 'gif') or ($file_ext == 'jpg')){
		if (is_uploaded_file($userfile_tmp)){
			$dir = 'img/upload/sub-cat/';
			$arquivo = $dir.uniqid().'.'.$file_ext;
			if (move_uploaded_file($userfile_tmp,$arquivo)){
				$insere = mysql_query("INSERT INTO consorcios
							VALUES ('', '$categoria','$descricao', '$credito', '$parcela', '$prazo', '', '$parcela_com_seguro', '', '$parcela_reduzida','$parcela_reduzida_com_seguro', '', '$fundo', '$taxa', '', '', '', '', '', '$lance_diluido', '', '$editor1', '', '', '$arquivo', '$nome_produto', '$nome_consorcio', '$editor2','$editor3','$editor4', '$publicado')");
				if ( $insere == '1' ){
					echo '<script>alert("Consórcio inserido com sucesso")</script>';
				}else{
					echo '<script>alert("Erro ao enviar o arquivo")</script>';
					unlink($arquivo);
				}
			}else{
				echo '<script>alert("Erro ao enviar o arquivo")</script>';
			}
		}else{
			echo '<script>alert("Erro ao enviar o arquivo")</script>';
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
					<h4 class="alert-heading">Aten&ccedil;&atilde;o!</h4>
					<p>VocÃª precisa ter o <a href="http://pt.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> ativado para usar este site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-plane"></i> Inserir Cons&oacute;rcio</h2>
					</div>
					<div class="box-content">

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                          
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Grupo</label>
                                <div class="controls">
									<?php //lista categorias
                                    $consultas = mysql_query("SELECT * FROM categorias_consorcios ORDER BY nome ASC");
                                    if (mysql_num_rows($consultas) == 0){
                                    }else{
                                        echo '<select name="categoria" required="required">';
                                        while ($res=mysql_fetch_array($consultas)) {
                                            echo '<option value="'.$res[0].'">'.$res[1].'</option>';
                                        }
                                        echo '</select><br/>';
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput">Imagem</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="arquivo" required="required">
							  </div>
							</div>
                            
                            
                            <div class="control-group">
                              <label class="control-label" for="selectError3">Descri&ccedil;&atilde;o do Bem</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="descricao"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Nome do Produto</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="nome_produto"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Nome do Consórcio</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="nome_consorcio"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Cr&eacute;dito R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="credito"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela com Seguro R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela_com_seguro" />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela Reduzida R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela_reduzida"  />
							  </div>
							</div>

							<div class="control-group">
                              <label class="control-label" for="selectError3">Parcela Reduzida com seguro R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="parcela_reduzida_com_seguro"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Prazo</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="prazo"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Taxa Administra&ccedil;&atilde;o</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="taxa" />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Fundo Reserva</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="fundo"  />
							  </div>
							</div>
							
							<div class="control-group">
                                <label class="control-label" for="selectError3">Lance Dilu&iacute;do</label>
                                <div class="controls">
									<select	name="lance_diluido">
										<option value=""></option>
										<option value="s">Sim</option>
										<option value="n">N&atilde;o</option>
									</select>
                                </div>
                            </div>
                            
                            <div class="control-group">
							  <label class="control-label" for="textarea2">CARACTER&iacute;STICAS DO GRUPO</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">OBSERVAÇÕES</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor2" name="editor2" rows="10"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">OBS 1º QUADRO</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor3" name="editor3" rows="10"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="textarea2">OBS 2º QUADRO</label>
							  <div class="controls">
								<textarea class="ckeditor" cols="80" id="editor4" name="editor4" rows="10"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">Publicado?</label>
							  <div class="controls">
                                <select name="publicado">
                                  <option value="0">N&atilde;o</option>
                                  <option value="1">Sim</option>
                                </select>
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