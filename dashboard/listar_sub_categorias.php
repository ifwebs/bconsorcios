<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){

	$id = $_GET['id'];	
	
	$seleciona_imagem = mysql_query("SELECT img_sub_cat FROM sub_cat WHERE id_sub_cat = '$id'");
	while ($res=mysql_fetch_array($seleciona_imagem)) {
		$seleciona_imagem = $res[0];
	}	

	$deletar = mysql_query("DELETE FROM sub_cat WHERE id_sub_cat = $id");

	if ($deletar=='1'){
		unlink($seleciona_imagem);
		echo '<script>alert("Subcategoria excluida com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao excluir a Subcategoria")</script>';
	}
	
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=listar_sub_categorias.php">';

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
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Imagem</th>
								  <th>Titulo</th>
								  <th>Grupo</th>
								  <th>Nº Parcelas</th>
								  <th>Valor Parcela</th>
								  <th>Nome do Produto</th>
								  <th>Valor Total</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						  $sql = mysql_query("SELECT * FROM sub_cat 
											INNER JOIN categorias_consorcios ON categorias_consorcios.id = sub_cat.id_categoria
											ORDER BY sub_cat.id_categoria ASC");
						  while($res = mysql_fetch_array($sql)){
							echo '<tr>';
								echo '<td><img src="'.$res[3].'" width="150" /></td>';
								echo '<td class="center">'.$res[2].'</td>';
								echo '<td class="center">'.$res[9].'</td>';
								echo '<td class="center">'.$res[4].'</td>';
								echo '<td class="center">'.$res[5].'</td>';
								echo '<td class="center">'.$res[6].'</td>';
								echo '<td class="center">'.$res[7].'</td>';
								
								echo '<td class="center">';	
									echo '&nbsp;';
									echo '<a class="btn btn-info" href="editar_sub_categoria.php?id='.$res[0].'"><i class="icon-edit icon-white"></i></a>';
									echo '&nbsp;';						
									echo '<a class="btn btn-danger" href="?id='.$res[0].'&acao=excluir" onClick="javascript:return confirm(\'Deseja relamente excluir a subcategoria \n'.$res[1].'?\');"><i class="icon-trash icon-white"></i></a>';
								echo '</td>';
							echo '</tr>';
						  }
						  ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
				
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		
	</div><!--/.fluid-container-->

	
	
	<?php include 'footer.php';?>