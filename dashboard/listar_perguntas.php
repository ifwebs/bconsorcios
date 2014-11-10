<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){

	$id = $_GET['id'];
	
	$deletar = mysql_query("DELETE FROM perguntas_frequentes WHERE id = '$id'");

	if ($deletar=='1'){
		echo '<script>alert("Pergunta excluida com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao excluir a pergunta")</script>';
	}
	
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0;URL=listar_perguntas.php">';
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
						<h2><i class="icon-plane"></i> Listagem Perguntas Frequentas</h2>
					</div>
					<div class="box-content">
                        
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Pergunta</th>
                                  <th>Resposta</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						  $sql = mysql_query("SELECT * FROM perguntas_frequentes");
						  while($res = mysql_fetch_array($sql)){
							echo '<tr>';
								echo '<td>'.$res[1].'</td>';
								echo '<td>'.$res[2].'</td>';
								
								echo '<td class="center">';
									echo '<a class="btn btn-info" href="editar_perguntas.php?id='.$res[0].'"><i class="icon-edit icon-white"></i></a>';
									echo '&nbsp;';
									echo '<a class="btn btn-danger" href="?id='.$res[0].'&acao=excluir" onClick="javascript:return confirm(\'Deseja relamente excluir  '.strtoupper($res[2]).'?\');"><i class="icon-trash icon-white"></i></a>';
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