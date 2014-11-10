<?php require 'includes/conexao.php';?>

<?php
	$slug = $_GET['slug'];
	$id = $_GET['id'];

	$cat = mysql_query("SELECT * FROM categorias_consorcios WHERE id = $id");
	$nome = mysql_fetch_array($cat);

	//$sql = mysql_query("SELECT * FROM consorcios WHERE categoria_consorcio_id = $id ORDER BY CAST(credito as SIGNED)");
	
	if ($id == 1){
		$titulo = "Consorcio Carro - Consorcio Fiat, Consorcio Volkswagen, Consorcio Chevrolet, Consorcio Ford, Consorcio Curitiba,  B Consorcios";
		$pchaves = "Consorcio Carro, Consorcio Fiat, Consorcio Volkswagen, Consorcio Chevrolet, Consorcio Ford, Consorcio Curitiba, B Consorcios";
		$desc = "FAÇA AQUI O CONSÓRCIO DO CARRO DOS SEUS SONHOS • Todas as marcas: FIAT, Volkswagen, Chevrolet, Ford... Com a segurança do Grupo Servopa.";
		$oculta = "Consorcio fiat, Consorcio volkswagen, Consorcio chevrolet, Consorcio ford, Consorcio carro";
		$name = "carro";
	}
	if ($id == 2){
		$titulo = "Consorcio Imoveis, Consorcio Casa, Consorcio Imoveis Apartamento, Consorcio Imoveis Casa,  B Consorcios";
		$pchaves = "Consorcio Imoveis, Consorcio Casa, Consorcio Imoveis Apartamento, Consorcio Imoveis Casa, Consorcio Curitiba, B Consorcio";
		$desc = "COM PLANEJAMENTO A AQUISIÇÃO DO SEU IMÓVEL FICA FÁCIL • Planos que cabem em seu orçamento ... Com a segurança do Grupo Servopa.";
		$oculta = "Consorcio Imoveis, Consorcio Casa, Consorcio Imoveis Apartamento, Consorcio Imoveis Casa, Consorcio Curitiba, B Consorcios";
		$name = "Imóveis";
	}
	if ($id == 3){
		$titulo = "Consorcio Honda, Moto Consorcio, Consorcio Yamaha, B Consorcios";
		$pchaves = "Consorcio Imoveis, Consorcio Casa, Consorcio Imoveis Apartamento, Consorcio Imoveis Casa, Consorcio Curitiba, B Consorcio";
		$desc = "COM PLANEJAMENTO A AQUISIÇÃO DO SEU IMÓVEL FICA FÁCIL • Planos que cabem em seu orçamento ... Com a segurança do Grupo Servopa.";
		$oculta = "Consorcio Honda, Moto Consorcio, Consorcio Yamaha, Consorcio Curitiba, B Consorcios";
		$name = "Honda.Moto";
	}
	if ($id == 4){
		$titulo = "Consorcio strada, consorcio saveiro, consorcio s10, consorcio hilux,  B Consorcios";
		$pchaves = "consorcio strada, consorcio saveiro, consorcio s10, consorcio hilux, Consorcio Curitiba, B Consorcio, consorcio caminhonetes, consorcio picapes";
		$desc = "FORÇA. POTÊNCIA. DESEMPENHO. Aqui você se organiza e materializa seu sonho. • Consórcio de Caminhonetes e Picapes. Todas as marcas ... Com a segurança do Grupo Servopa.";
		$oculta = "Consorcio strada, Consorcio saveiro, Consorcio s10, Consorcio hilux, Consorcio caminhonete, Consorcio picape, Consorcio Curitiba, B Consorcios";
		$name = "Caminhonetes e Picapes";
	}
?>
<!doctype html>
<html lang="pt-br">
<head
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulo; ?></title>

<meta name="keywords" content="<?php echo $pchaves; ?>" /> 
<meta name="description" content="<?php echo $desc; ?>" />

<?php include 'includes/head.php';?>

</head>
<body>
<h1 class="txt"><?php echo $oculta; ?></h1>
<div class="all">
	<?php include 'includes/header.php';?>
	<div class="clear"></div>
	<section class="lista content wrap-content" style="padding:20px 0;">
		<h1>cons&oacute;rcio de <?php echo $name;?></h1>
		<article class="thumbs">
			<div class="wrap-thumbs">
				<?php 
					if ($id == 1){
						echo "<p>Esses s&atilde;o os modelos de carros preferidos dos brasileiros.<br>
						Confira como fica o cons&oacute;rcio para essas possibilidades de compra. O carro dos seus sonhos tamb&eacute;m deve estar aqui!</p>";
					}else if ($id == 2){
						echo "<p>Esses s&atilde;o os modelos de imóveis preferidos dos brasileiros.<br>
						Confira como fica o cons&oacute;rcio para essas possibilidades de compra. O imóvel dos seus sonhos tamb&eacute;m deve estar aqui!</p>";
					}else if ($id == 3){
						echo "<p>Esses s&atilde;o os modelos de motos preferidos dos brasileiros.<br>
						Confira como fica o cons&oacute;rcio para essas possibilidades de compra. A Moto dos seus sonhos tamb&eacute;m deve estar aqui!</p>";
					}else{
						echo "<p>Esses s&atilde;o os modelos de caminhonetes preferidos dos brasileiros.<br>
						Confira como fica o cons&oacute;rcio para essas possibilidades de compra. A Caminhonete dos seus sonhos tamb&eacute;m deve estar aqui!</p>";
					}
				?>
					<a id="prev" class="prev" href="#"><img src="<?php echo $base_url?>images/img_prev.png" alt="" /></a>
					<div id="carousel">
					<?php 
						$sql = mysql_query("SELECT id, imagem_produto, credito, nome_consorcio, nome_produto, parcela, prazo  FROM consorcios WHERE categoria_consorcio_id = $id AND publicado = 1");
						while ($row = mysql_fetch_array($sql)) {
							echo "
								<figure onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">
									<img src='{$base_url}dashboard/{$row['imagem_produto']}' width='225px' height='120px' />
									<figcaption><br><br>
										<p class='ift_parc'>{$row['prazo']}x</p>
										<p class='ift_valp'>R$ {$row['parcela']}</p>
										<p class='ift_nome'>{$row['nome_produto']}</p>
										<p class='ift_valt'>R$ {$row['credito']}</p>
									</figcaption>
									<h1>{$row['nome_consorcio']}</h1>
								</figure>
							";
						}
					?>
					</div>
					<a id="next" class="next" href="#"><img src="<?php echo $base_url?>images/img_next.png" alt="" /></a>
				</div>
				<!-- /.content -->
				<div class="clear"></div>
				<!-- /.clear -->
			</article>
			<article class="content info-cons">
				<div class="bl-left">
					<p class="bl-txt1">
						<?php 
							if ($id == 1){
								echo "Para voc&ecirc; que decidiu comprar um carro sem se endividar, planeja trocar de carro nos pr&oacute;ximos anos ou ainda sente a necessidade de ter mais um carro na fam&iacute;lia, aqui est&atilde;o as melhores op&ccedil;&otilde;es de cons&oacute;rcio de carros com o respaldo do Grupo Servopa, tradi&ccedil;&atilde;o desde 1966.";
							}else if ($id == 2){
								echo "Para voc&ecirc; que decidiu comprar um imóvel sem se endividar, planeja trocar de imóvel nos pr&oacute;ximos anos ou ainda sente a necessidade de ter mais um imóvel na fam&iacute;lia, aqui est&atilde;o as melhores op&ccedil;&otilde;es de cons&oacute;rcio de imóvel com o respaldo do Grupo Servopa, tradi&ccedil;&atilde;o desde 1966.";
							}else if ($id == 3){
								echo "Para voc&ecirc; que decidiu comprar uma moto sem se endividar, planeja trocar de moto nos pr&oacute;ximos anos ou ainda sente a necessidade de ter mais uma moto na fam&iacute;lia, aqui est&atilde;o as melhores op&ccedil;&otilde;es de cons&oacute;rcio de moto com o respaldo do Grupo Servopa, tradi&ccedil;&atilde;o desde 1966.";
							}else{
								echo "Para voc&ecirc; que decidiu comprar uma caminhonete sem se endividar, planeja trocar de caminhonete nos pr&oacute;ximos anos ou ainda sente a necessidade de ter mais uma caminhonete na fam&iacute;lia, aqui est&atilde;o as melhores op&ccedil;&otilde;es de cons&oacute;rcio de caminhonete com o respaldo do Grupo Servopa, tradi&ccedil;&atilde;o desde 1966.";
							}
						?>
						
					</p>
					<!-- /.bl-txt1 -->
					<p class="bl-txt2">
						Escolha abaixo o plano de cons&oacute;rcio que mais se aproxima do valor de sua prefer&ecirc;ncia e veja mais detalhes: 
					</p>
					<!-- /.bl-txt2 -->
				</div>
				<!-- /.bl-left -->
				<div class="bl-right">
					<?php echo nl2br($nome['descricao_details']);?>
				</div>
				<!-- /.bl-right -->
				<div class="clear"></div>
				<!-- /.clear -->
			</article>
			<!-- /.content -->
			<div class="content">
				<div class="tabela-val-planos">
					<p>CONTRATE AQUI SEU CONS&Oacute;RCIO DE <?php echo $name ;?>. &Eacute; F&Aacute;CIL E R&Aacute;PIDO!</p>
					<div id="valores-planos">
						<ul>
						<?php 
							$sql_10 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 8 AND 30 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_10) != 0){
									echo "<li><span>de R$8.000 &agrave; R$30.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_10)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_20 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 30 AND 50 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_20) != 0){
									echo "<li><span>de R$30.000 &agrave; R$50.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_20)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_30 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 50 AND 70 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_30) != 0){
									echo "<li><span>de R$50.000 &agrave; R$70.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_30)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_40 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 70 AND 90 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_40) != 0){
									echo "<li><span>de R$70.000 &agrave; R$90.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_40)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_50 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 90 AND 110 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_50) != 0){
									echo "<li><span>de R$90.000 &agrave; R$110.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_50)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
										
							<?php 
							$sql_60 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 110 AND 150 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_60) != 0){
									echo "<li><span>de R$110.000 &agrave; R$150.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_60)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_70 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 150 AND 200 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_70) != 0){
									echo "<li><span>de R$150.000 &agrave; R$200.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_70)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_80 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 200 AND 290 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_80) != 0){
									echo "<li><span>de R$200.000 &agrave; R$290.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_80)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_90 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 290 AND 350 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_90) != 0){
									echo "<li><span>de R$290.000 &agrave; R$350.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_90)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_100 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 350 AND 480 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_100) != 0){
									echo "<li><span>de R$350.000 &agrave; R$480.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_100)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
							
							<?php 
							$sql_110 = mysql_query("SELECT id, credito, parcela, prazo FROM consorcios 
												WHERE categoria_consorcio_id = $id AND credito BETWEEN 480 AND 600 
												ORDER BY CAST( credito AS SIGNED ) ");
							?>
							<?php 
								if (mysql_num_rows($sql_110) !=0){
									echo "<li><span>de R$480.000 &agrave; R$600.000</span>
											<table>
												<tbody>
													<tr>
														<th>Plano</th>
														<th>Prazo / Meses</th>
														<th>Parcela</th>
													</tr>";
												$url = "detalhes-consorcio.php";
												while ($row = mysql_fetch_array($sql_110)) {
													echo "<tr onclick=\"document.location='{$base_url}detalhes/{$row['id']}';\">";
													echo "<td>R$ {$row['credito']}</td>";
													echo "<td>{$row['prazo']}</td>";
													echo "<td>R$ {$row['parcela']}</td>";
													echo "</tr>
													";
												}
											echo "	<!-- ltima linha permanece como esta, estÃ¡ sendo usada como borda inferior -->
												<tr><td></td><td></td><td></td></tr>
												</tbody>
												</table>
												</li>";
								}
							?>
						</ul>
					</div>
				</div>
				<!-- /.planos -->
				<div class="clear"></div>
				<!-- /.clear -->
			</div>
			<!-- /.content -->
			<article class="icon_car">
			<p>Outras modalidades de Cons&oacute;rcio </p>
				<ul>
					<li><a href="<?php echo $base_url?>categoria/1-automovel" class="icon_carro"></a>
						<li><a href="<?php echo $base_url?>categoria/2-imovel" class="icon_house"></a>
							<li><a href="<?php echo $base_url?>categoria/3-moto" class="icon_bike"></a>
								<li><a href="<?php echo $base_url?>categoria/4-caminhao" class="icon_van"></a>
								</ul>
							</article> 
							<div class="clear">	</div>
						</section>
						<div class="clear">	</div>
						<hr>
						<?php include 'includes/footer.php';?>
					</body>
					
					</html>