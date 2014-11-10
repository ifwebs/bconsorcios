<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_POST['inserir']) && $_POST['inserir'] == 'cadastra'){

	$userfile_name = $_FILES['arquivo']['name'];
	$userfile_tmp = $_FILES['arquivo']['tmp_name'];
	$filename = basename($_FILES['arquivo']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));

	$titulo = $_POST['nome_sub_cat'];
	$categoria = $_POST['categoria'];
	$qt_parcela = $_POST['qt_parcela'];
	$valor_parcela = $_POST['valor_parcela'];
	$nome_produto = $_POST['nome_produto'];
	$valor_total = $_POST['valor_total'];

	if (($file_ext == 'png') or ($file_ext == 'gif') or ($file_ext == 'jpg')){
		if (is_uploaded_file($userfile_tmp)){
			$dir = 'img/upload/sub-cat/';
			$arquivo = $dir.uniqid().'.'.$file_ext; 
			if (move_uploaded_file($userfile_tmp,$arquivo)){
				$insere = mysql_query("INSERT INTO sub_cat
									   VALUES ('',$categoria, '$titulo', '$arquivo', '$qt_parcela', '$valor_parcela', '$nome_produto', '$valor_total')");
				if ( $insere == '1' ){
					echo '<script>alert("Sub Categoria inserida com sucesso")</script>';
				}else{
					echo '<script>alert("Erro ao enviar a imagem")</script>';
					unlink($arquivo);
				}
			}else{
				echo '<script>alert("Erro ao enviar a imagem")</script>';
			}
		}else{
			echo '<script>alert("Erro ao enviar a imagem")</script>';
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
						<h2><i class="icon-picture"></i> Inserir Sub Categoria</h2>
					</div>
					<div class="box-content">

						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						  <fieldset>
                                                      
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Título</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="nome_sub_cat" required="required" />
							  </div>
							</div>
							
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
                              <label class="control-label" for="selectError3">Quantidade de Parcelas</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="qt_parcela"  />
							  </div>
							</div> 
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Valor da Parcela R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="valor_parcela"  />
							  </div>
							</div>
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Nome do Produto</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="nome_produto"  />
							  </div>
							</div> 
							
							<div class="control-group">
                              <label class="control-label" for="selectError3">Valor Total R$</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead dinheiro" id="typeahead" name="valor_total"  />
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