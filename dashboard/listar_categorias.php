<?php
include_once 'conexao.php';
include_once("includes/auth.php");
include_once("header.php");

?>

		<div class="container-fluid">
		<div class="row-fluid">
				
			<?php include 'menu.php';?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Atencao!</h4>
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
								  <th>Categoria</th>
								  <th>Imagem</th>
								  <th>Descricao</th>
								  <th>Descricao Detalhes</th>
								  <th>Acoes</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php
						  $sql = mysql_query("SELECT * FROM categorias_consorcios ORDER BY id DESC");
						  while($res = mysql_fetch_array($sql)){
							echo '<tr>';
								echo '<td class="center">'.$res[1].'</td>';
								echo '<td><img src="'.$res[5].'" width="150" /></td>';
								echo '<td class="center">'.$res[6].'</td>';
								echo '<td class="center">'.$res[7].'</td>';
								echo '<td class="center">';	
									echo '&nbsp;';
									echo '<a class="btn btn-info" href="editar_categoria.php?id='.$res[0].'"><i class="icon-edit icon-white"></i></a>';
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