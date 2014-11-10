<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cons&oacute;rcio Servopa Curitiba</title>

<meta name="keywords" content="" />
<meta name="description" content="" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>

<?php
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM consorcios WHERE id = $id");
	$res = mysql_fetch_array($sql);


	switch ($res['categoria_consorcio_id']) {
		case '1':
			$categoria  = "Autom&oacute;vel";
			break;
		case '2':
			$categoria  = "Im&oacute;vel";
			break;
		case '3':
			$categoria  = "Moto";
			break;
		case '4':
			$categoria  = "Caminh&atilde;o";
			break;
	}
	/*$real = number_format($res['credito'], 2);*/
?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="compra content wrap-content">
		<h1>COMPRA ONLINE</h1>
		<hr>
		<p>Os dados abaixo especificados servem como base contratual entre o Consorciado e a Administradora. Respeitam as normas vigentes do Banco Central do Brasil. Certificado de Autoriza&ccedil;&atilde;o n&ordm; MF/SRF: 03/00/111/90</p>
		<form action="<?php echo $base_url?>envia.php" enctype="multipart/form-data" method="post" id="formcompra" name="formcompra">
		<ul class="links_form">
			<li><a href="#identificacao" class="ativo" id="lIdent">Identifica&ccedil;&atilde;o</a>
			<li><span>|</span>
			<li><a href="#endereco" id="lEnd">Endere&ccedil;o</a>
			<li><span>|</span>
			<li><a href="#seguro" id="lSeg">Seguro de vida</a>
			<li><span>|</span>
			<li><a href="#resumo" id="lRes">Resumo</a>
		</ul>
		<fieldset id="identificacao" class="contaba">
			<?php
				if($res['categoria_consorcio_id'] == 2){
					echo "
						<div class='modelForm'>
							<h3>Pagar com parcela reduzida?</h3>
							<input type='radio' name='p_red' class='s_red'> Sim <input type='radio' name='p_red' class='n_red' checked> N&atilde;o
						</div>
					";
				}
			?>
			<h2>identifica&ccedil;&atilde;o</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Tipo:</label>
						</td>
						<td align="left">
							<select name="tipo" id="tipo">
								<option value="pessoa fisica">Pessoa F&iacute;sica</option>
								<option value="pessoa juridica">Pessoa Jur&iacute;dica</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Nome:</label>
						</td>
						<td align="left">
							<input type="text" name="nome" id="nome" required placeholder="Informe seu nome">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Email:</label>
						</td>
						<td align="left">
							<input type="text" name="email" id="email" required placeholder="exemplo@email.com">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>CPF/CNPJ:</label>
						</td>
						<td align="left">
							<input type="text" name="cpf" id="cpf" required placeholder="000.000.000-00">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>RG /<br>Inscri&ccedil;&atilde;o Estadual:</label>
						</td>
						<td align="left">
							<input type="text" name="rg" id="rg" required placeholder="0.000.000-0">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado Emissor:</label>
						</td>
						<td align="left">
							<select name="estadoem" id="estadoem">
								<option value=""  selected="selected">Selecione</option>
									<option value="AC" >Acre</option>
									<option value="AL" >Alagoas</option>
									<option value="AM" >Amazonas</option>
									<option value="AP" >Amap&aacute;</option>
									<option value="BA" >Bahia</option>
									<option value="CE" >Cear&aacute;</option>
									<option value="DF" >Distrito Federal</option>
									<option value="ES" >Esp&iacute;rito Santo</option>
									<option value="GO" >Goi&aacute;s</option>
									<option value="MA" >Maranh&atilde;o</option>
									<option value="MG" >Minas Gerais</option>
									<option value="MS" >Mato Grosso do Sul</option>
									<option value="MT" >Mato Grosso</option>
									<option value="PA" >Par&aacute;</option>
									<option value="PB" >Paraiba</option>
									<option value="PE" >Pernambuco</option>
									<option value="PI" >Piau&iacute;</option>
									<option value="PR" >Paran&aacute;</option>
									<option value="RJ" >Rio de Janeiro</option>
									<option value="RN" >Rio Grande do Norte</option>
									<option value="RO" >Rondônia</option>
									<option value="RR" >Roraima</option>
									<option value="RS" >Rio Grande do Sul</option>
									<option value="SC" >Santa Catarina</option>
									<option value="SE" >Sergipe</option>
									<option value="SP" >S&atilde;o Paulo</option>
									<option value="TO" >Tocantins</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Sexo:</label>
						</td>
						<td align="left">
							<input type="radio" name="sexo" value="Masculino">Masculino<input type="radio" name="sexo" value="feminino">Feminino
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Nascimento:</label>
						</td>
						<td align="left">
							<input type="text" name="nascimento" id="nascimento" required placeholder="DD/MM/AAAA">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado civil:</label>
						</td>
						<td align="left">
							<input type="text" name="estcivil" id="estcivil" required placeholder="Solteiro">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Profiss&atilde;o:</label>
						</td>
						<td align="left">
							<input type="text" name="profissao" id="profissao" required placeholder="Ex: Professor">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Renda Mensal:</label>
						</td>
						<td align="left">
							<input type="text" name="renda" id="renda" required placeholder="Ex: R$ 700,00">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Naturalidade:</label>
						</td>
						<td align="left">
							<input type="text" name="naturalidade" id="naturalidade" required placeholder="Ex: Estado / Cidade">
						</td>
					</tr>
				</tbody>
			</table>
			<a href="#endereco" class="btn-avancar" id="aba1">Avan&ccedil;ar</a>
		</fieldset>
		<fieldset id="endereco" class="contaba">
			<h2 class="al-h2C">Residencial</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Rua:</label>
						</td>
						<td align="left">
							<input type="text" name="rua" id="rua" required placeholder="Nome da rua">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Bairro:</label>
						</td>
						<td align="left">
							<input type="text" name="bairro" id="bairro" placeholder="Informe o bairro">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado:</label>
						</td>
						<td align="left">
							<select name="estado" id="estado">
								<option value=""  selected="selected">Selecione</option>
									<option value="AC" >Acre</option>
									<option value="AL" >Alagoas</option>
									<option value="AM" >Amazonas</option>
									<option value="AP" >Amap&aacute;</option>
									<option value="BA" >Bahia</option>
									<option value="CE" >Cear&aacute;</option>
									<option value="DF" >Distrito Federal</option>
									<option value="ES" >Esp&iacute;rito Santo</option>
									<option value="GO" >Goi&aacute;s</option>
									<option value="MA" >Maranh&atilde;o</option>
									<option value="MG" >Minas Gerais</option>
									<option value="MS" >Mato Grosso do Sul</option>
									<option value="MT" >Mato Grosso</option>
									<option value="PA" >Par&aacute;</option>
									<option value="PB" >Paraiba</option>
									<option value="PE" >Pernambuco</option>
									<option value="PI" >Piau&iacute;</option>
									<option value="PR" >Paran&aacute;</option>
									<option value="RJ" >Rio de Janeiro</option>
									<option value="RN" >Rio Grande do Norte</option>
									<option value="RO" >Rondônia</option>
									<option value="RR" >Roraima</option>
									<option value="RS" >Rio Grande do Sul</option>
									<option value="SC" >Santa Catarina</option>
									<option value="SE" >Sergipe</option>
									<option value="SP" >S&atilde;o Paulo</option>
									<option value="TO" >Tocantins</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Cidade:</label>
						</td>
						<td align="left">
							<input type="text" name="cidade" id="cidade" required placeholder="Informe a cidade que reside">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>CEP:</label>
						</td>
						<td align="left">
							<input type="text" name="cep" id="cep" required placeholder="00.000-000">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Telefone:</label>
						</td>
						<td align="left">
							<input type="text" name="telefone" id="telefone" required placeholder="(00) 0000-0000">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Celular:</label>
						</td>
						<td align="left">
							<input type="text" name="celular" id="celular" required placeholder="(00) 0000-0000">
						</td>
					</tr>
				</tbody>
			</table>
			<h2 class="al-h2C">Comercial</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Rua:</label>
						</td>
						<td align="left">
							<input type="text" name="ruaC" id="ruaC" required placeholder="Informe a rua">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Bairro:</label>
						</td>
						<td align="left">
							<input type="text" name="bairroC" id="bairroC" placeholder="Informe o bairro">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado:</label>
						</td>
						<td align="left">
							<select name="estadoC" id="estadoC">
								<option value=""  selected="selected">Selecione</option>
									<option value="AC" >Acre</option>
									<option value="AL" >Alagoas</option>
									<option value="AM" >Amazonas</option>
									<option value="AP" >Amap&aacute;</option>
									<option value="BA" >Bahia</option>
									<option value="CE" >Cear&aacute;</option>
									<option value="DF" >Distrito Federal</option>
									<option value="ES" >Esp&iacute;rito Santo</option>
									<option value="GO" >Goi&aacute;s</option>
									<option value="MA" >Maranh&atilde;o</option>
									<option value="MG" >Minas Gerais</option>
									<option value="MS" >Mato Grosso do Sul</option>
									<option value="MT" >Mato Grosso</option>
									<option value="PA" >Par&aacute;</option>
									<option value="PB" >Paraiba</option>
									<option value="PE" >Pernambuco</option>
									<option value="PI" >Piau&iacute;</option>
									<option value="PR" >Paran&aacute;</option>
									<option value="RJ" >Rio de Janeiro</option>
									<option value="RN" >Rio Grande do Norte</option>
									<option value="RO" >Rondônia</option>
									<option value="RR" >Roraima</option>
									<option value="RS" >Rio Grande do Sul</option>
									<option value="SC" >Santa Catarina</option>
									<option value="SE" >Sergipe</option>
									<option value="SP" >S&atilde;o Paulo</option>
									<option value="TO" >Tocantins</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Cidade:</label>
						</td>
						<td align="left">
							<input type="text" name="cidadeC" id="cidadeC" required placeholder="Informe a cidade">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>CEP:</label>
						</td>
						<td align="left">
							<input type="text" name="cepC" id="cepC" required placeholder="00.000-000">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Telefone:</label>
						</td>
						<td align="left">
							<input type="text" name="telefoneC" id="telefoneC" required placeholder="(00) 0000-0000">
						</td>
					</tr>
				</tbody>
			</table>
			<div class="end-cobranca">
				<h2 class="al-h2C">Endere&ccedil;o de cobran&ccedil;a</h2>
			<input type="radio" name="t_end" class="residencial">Residencial<input type="radio" name="t_end" class="comercial">Comercial<input type="radio" name="t_end" class="email">e-mail
			</div>
			<a href="#seguro" class="btn-avancar" id="aba2">Avan&ccedil;ar</a>
		</fieldset>
		<fieldset id="seguro" class="contaba">
			<h2 class="al-h2C">Seguro de vida</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Com seguro?</label>
						</td>
						<td align="left">
							<input type="radio" name="seguro" class="s_seg">Sim<input type="radio" name="seguro" class="n_seg" checked>N&atilde;o
						</td>
					</tr>
				</tbody>
			</table>
			<div class="seg contaba">
				<p>Atrav&eacute;s desta solicito a minha inscri&ccedil;&atilde;o no Seguro de Vida em Grupo que esta Administradora mant&eacute;m com uma Companhia Seguradora. Determino que ocorrendo minha falta a indeniza&ccedil;&atilde;o dever&aacute; ser paga a SERVOPA ADMINISTRADORA DE CONS&Oacute;RCIOS Ltda., que reter&aacute; o valor necess&aacute;rio para quita&ccedil;&atilde;o total de minha cota de cons&oacute;rcio, vencidas ou vicendas, e repassando o saldo se houver para:</p>
				<tr>
					<td align="right">
						<label>Benefici&aacute;rio:</label>
					</td>
					<td align="left">
						<input type="text" name="cpfBem" placeholder="Informe o nome e o CPF do benefici&aacute;rio...">
					</td>
				</tr>
				<p>Declaro ter ci&ecirc;ncia que a cobertura se iniciar&aacute; a partir do dia seguinte a minha participa&ccedil;&atilde;o em assembl&eacute;ia do grupo ao qual me inscrevi, tenho idade inferior a 65 anos e estou em perfeitas condi&ccedil;&otilde;es de sa&uacute;de, n&atilde;o tendo defici&ecirc;ncia de &oacute;rg&atilde;os, membros ou sentidos, ou sofrido mol&eacute;stia grave nos &uacute;ltimos tr&ecirc;s anos, ciente de que, quaisquer omiss&otilde;es tornar&aacute; nulo este seguro, nos termos do artigo 1444 do C&oacute;digo Civil Brasileiro. Obs: O seguro de vida em grupo &eacute; votado na assembl&eacute;ia de constitui&ccedil;&atilde;o.</p>
			</div>
			<a href="#resumo" class="btn-avancar" id="aba3">Avan&ccedil;ar</a>
		</fieldset>

		<fieldset id="resumo" class="contaba">
			<h2 class="al-h2C" style="left:20px;">Resumo da compra</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Prazo</label>
						</td>
						<td align="left">
							<input type="text" disabled="" name="prazo" id="prazo" value="<?php echo $res['prazo']?> meses" >
							<input type="hidden" name="prazo1" id="prazo1" value="<?php echo $res['prazo']?> meses" >
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Categoria</label>
						</td>
						<td align="left">
							<input type="text" disabled="" name="cat" id="cat" value="<?php echo $categoria?>" >
							<input type="hidden" name="cat1" id="cat1" value="<?php echo $categoria?>" >
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Parcela Reduzida?</label>
						</td>
						<td align="left">
							<input type="text" disabled="" name="parcela_reduzida" id="parcela_reduzida" value="NAO" >
							<input type="hidden" name="parcela_reduzida1" id="parcela_reduzida1" value="NAO" >
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Parcela com Seguro?</label>
						</td>
						<td align="left">
							<input type="text" disabled="" name="com_seguro" id="com_seguro" value="NAO" >
							<input type="hidden" name="com_seguro1" id="com_seguro1" value="NAO" >
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Endere&ccedil;o de cobran&ccedil;a</label>
						</td>
						<td align="left">
							<input type="text" disabled="" name="end_cobranca" id="end_cobranca" value="" >
							<input type="hidden" name="end_cobranca1" id="end_cobranca1" value="" >
							<input type="hidden" name="preco_final" id="preco_final" value="" >
	
							<input type="hidden" name="descricao_bem" id="descricao_bem" value="<?php echo $res['descricao_bem']?>" >
							<input type="hidden" name="cre" id="cre" value="<?php echo $res['credito']?>" >
							<input type="hidden" name="parc" id="parc" value="<?php echo $res['parcela']?>" >
							<input type="hidden" name="parc_com_seguro" id="parc_com_seguro" value="<?php echo $res['parcela_com_seguro']?>" >
							<input type="hidden" name="parc_reduzida" id="parc_reduzida" value="<?php echo $res['parcela_reduzida']?>" >
							<input type="hidden" name="parc_reduzida_com_seguro" id="parc_reduzida_com_seguro" value="<?php echo $res['parcela_reduzida_com_seguro']?>" >
						</td>
					</tr>
					<tr>
						<td align="right">
						</td>
						<td align="left">
							<input type="checkbox" name="concordo" id="concordo"> Estou de acordo com o <a href="http://www.bconsorcios.com.br/contrato-consorcio-servopa.pdf" target="_blank" style="font-style:italic;font-weight:bold;">contrato de ades&atilde;o.</a>
						</td>
					</tr>
					<tr>
						<td align="right">
						</td>
						<td align="left">
							<input class="btn-enviar" type="button" value="Enviar" style="color:#FFF;" onclick="verifica();">
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
		</form>
		<article class="valores">
			<h3>plano: <b>R$ <?php echo $res['credito'];?></b></h3>
			<h2 class="sem_seg">Parcela:</h2>
			<h1 class="sem_seg">R$ <?php echo $res['parcela'];?></h1>

			<h2 class="com_seg">Parcela com seguro:</h2>
			<h1 class="com_seg">R$ <?php echo $res['parcela_com_seguro'];?></h1>

			<h2 class="p_redu">Parcela reduzida:</h2>
			<h1 class="p_redu">R$ <?php echo $res['parcela_reduzida'];?></h1>

			<h2 class="p_redu_c_seg">Parcela reduzida c/ seguro:</h2>
			<h1 class="p_redu_c_seg">R$ <?php echo $res['parcela_reduzida_com_seguro'];?></h1>
		</article>
		<div class="clear"></div>
		</section>

		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>