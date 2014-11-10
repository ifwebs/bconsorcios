<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){

	$id = $_GET['id'];
	
	$seleciona_imagem = mysql_query("SELECT imagem_produto FROM consorcios WHERE id = '$id'");
	while ($res=mysql_fetch_array($seleciona_imagem)) {
		$seleciona_imagem = $res[0];
	}	

	$deletar = mysql_query("DELETE FROM consorcios WHERE id = $id");

	if ($deletar=='1'){
		unlink($seleciona_imagem);
		echo '<script>alert("Consórcio excluido com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao excluir o Consórcio")</script>';
	}
	
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=listar_consorcio.php">';
	exit();

}

//despublica o Consórcio
if (isset($_GET['acao']) && $_GET['acao'] == 'despublicar'){

	$id = $_GET['id'];

	$mudar_despublicar = mysql_query("UPDATE consorcios SET publicado = '0' WHERE id = $id");
	if ($mudar_despublicar == '1'){
		echo '<script>alert("Consórcio despublicado com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao despublicar Consórcio")</script>';
	}

	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=listar_consorcio.php">';
	exit();

}
//publica o Consórcio
if (isset($_GET['acao']) && $_GET['acao'] == 'publicar'){

	$id = $_GET['id'];

	$mudar_despublicar = mysql_query("UPDATE consorcios SET publicado = '1' WHERE id = $id");
	if ($mudar_despublicar == '1'){
		echo '<script>alert("Consórcio publicado com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao publicar Consórcio")</script>';
	}

	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=listar_consorcio.php">';
	exit();

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
						<h2><i class="icon-plane"></i> Listagem Consorcios</h2>
					</div>
					<div class="box-content">
                        
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Categoria</th>
                                  <th>Descricao</th>
								  <th>Credito</th>
								  <th>Nome Produto</th>
								  <th>Nome do Consorcio</th>
								  <th>Publicado</th>
								  <th>Acoes</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						  $sql = mysql_query("SELECT * FROM consorcios 
						  					  INNER JOIN categorias_consorcios ON categorias_consorcios.id = consorcios.categoria_consorcio_id
						  					  ORDER BY consorcios.categoria_consorcio_id ASC");
						  while($res = mysql_fetch_array($sql)){
							echo '<tr>';
								echo '<td>'.$res[32].'</td>';
								echo '<td>'.$res[2].'</td>';
								echo '<td>R$ '.$res[3].'</td>';
								echo '<td>'.$res[25].'</td>';
								echo '<td>'.$res[26].'</td>';
								echo '<td>'.(($res[30]=='1')?'Sim':'N&atilde;o').'</td>';
								
								echo '<td class="center">';
								if($res[30]==0){
									echo '<a class="btn btn-success" href="?id='.$res[0].'&acao=publicar" title="Publicar"><i class="icon-thumbs-up icon-white"></i></a>';
								}else{
									echo '<a class="btn btn-danger" href="?id='.$res[0].'&acao=despublicar" title="Despublicar"><i class="icon-thumbs-down icon-white"></i></a>';
								}
									echo '<a class="btn btn-info" href="editar_consorcio.php?id='.$res[0].'" title="Editar"><i class="icon-edit icon-white"></i></a>';
									echo '&nbsp;';
									echo '<a class="btn btn-danger" href="?id='.$res[0].'&acao=excluir" onClick="javascript:return confirm(\'Deseja relamente excluir  '.strtoupper($res[2]).'?\');" title="Excluir"><i class="icon-trash icon-white"></i></a>';
								echo '</td>';
							echo '</tr>';
						  }
						  ?>
						  </tbody>
					  </table> 

					</div>
				</div>
			</div>
				
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		
	</div><!--/.fluid-container-->

	
	
	<?php include 'footer.php';?>