<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consórcio Servopa Curitiba</title>

<meta name="keywords" content="" /> 
<meta name="description" content="" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>

<?php 
	$id = $_GET['id'];
	
	$sql = mysql_query("SELECT * FROM consorcios WHERE id = $id");
	$res = mysql_fetch_array($sql);
	$real = number_format($res['credito'], 2);
?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="compra content">
		<h1>Compra online</h1>
		<hr>
		<p>Os dados abaixo especificados servem como base contratual entre o Consorciado e a Administradora. Respeitam as normas vigentes do Banco Central do Brasil. Certificado de Autorização nº MF/SRF: 03/00/111/90</p>
		<form>
		<ul class="links_form">
			<li><a href="#identificacao" class="ativo">Identificação</a>
			<li><span>|</span>
			<li><a href="#endereco">Endereço</a>
			<li><span>|</span>
			<li><a href="#seguro">Seguro de vida</a>
			<li><span>|</span>
			<li><a href="#resumo">Resumo</a>
		</ul>
		
		<fieldset id="identificacao" class="contaba">
			<h2>identificação</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Tipo:</label>
						</td>
						<td align="left">
							<input type="text" name="tipo" id="tipo">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Nome:</label>
						</td>
						<td align="left">
							<input type="text" name="nome" id="nome" onblur="resumo()">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Email:</label>
						</td>
						<td align="left">
							<input type="text" name="email" id="email">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>CPF:</label>
						</td>
						<td align="left">
							<input type="text" name="cpf" id="cpf">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>RG:</label>
						</td>
						<td align="left">
							<input type="text" name="rg" id="rg">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado Emissor:</label>
						</td>
						<td align="left">
							<input type="text" name="estadoem" id="estadoem">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Sexo:</label>
						</td>
						<td align="left">
							<input type="radio" name="masculino" id="masculino">Masculino<input type="radio" name="feminino" id="feminino">Feminino
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Nascimento:</label>
						</td>
						<td align="left">
							<input type="text" name="nascimento" id="nascimento">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado civil:</label>
						</td>
						<td align="left">
							<input type="text" name="estcivil" id="estcivil">
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
		
		<fieldset id="endereco" class="contaba">
			<h2>Endereço</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Rua:</label>
						</td>
						<td align="left">
							<input type="text" name="rua" id="rua">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Bairo:</label>
						</td>
						<td align="left">
							<input type="text" name="bairro" id="bairro">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Estado:</label>
						</td>
						<td align="left">
							<select>
								<option value=""  selected="selected">Selecione</option>
									<option value="AC" >Acre</option>
									<option value="AL" >Alagoas</option>
									<option value="AM" >Amazonas</option>
									<option value="AP" >Amapá</option>
									<option value="BA" >Bahia</option>
									<option value="CE" >Ceará</option>
									<option value="DF" >Distrito Federal</option>
									<option value="ES" >Espírito Santo</option>
									<option value="GO" >Goiás</option>
									<option value="MA" >Maranhão</option>
									<option value="MG" >Minas Gerais</option>
									<option value="MS" >Mato Grosso do Sul</option>
									<option value="MT" >Mato Grosso</option>
									<option value="PA" >Pará</option>
									<option value="PB" >Paraiba</option>
									<option value="PE" >Pernambuco</option>
									<option value="PI" >Piauí</option>
									<option value="PR" >Paraná</option>
									<option value="RJ" >Rio de Janeiro</option>
									<option value="RN" >Rio Grande do Norte</option>
									<option value="RO" >Rondônia</option>
									<option value="RR" >Roraima</option>
									<option value="RS" >Rio Grande do Sul</option>
									<option value="SC" >Santa Catarina</option>
									<option value="SE" >Sergipe</option>
									<option value="SP" >São Paulo</option>
									<option value="TO" >Tocantins</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Cidade:</label>
						</td>
						<td align="left">
							<input type="text" name="cidade" id="cidade">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>CEP:</label>
						</td>
						<td align="left">
							<input type="text" name="cep" id="cep">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Telefone:</label>
						</td>
						<td align="left">
							<input type="text" name="telefone" id="telefone">
						</td>
					</tr>
					<tr>
						<td align="right">
							<label>Celular:</label>
						</td>
						<td align="left">
							<input type="text" name="celular" id="celular">
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
		
		<fieldset id="seguro" class="contaba">
			<h2>Seguro de vida</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>Com seguro?</label>
						</td>
						<td align="left">
							<input type="radio" name="seguro" class="s_seg">Sim<input type="radio" name="seguro" class="n_seg">Não
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
			<div class="seg">
				<p>Através desta solicito a minha inscrição no Seguro de Vida em Grupo que esta Administradora mantém com uma Companhia Seguradora. Determino que ocorrendo minha falta a indenização deverá ser paga a SERVOPA ADMINISTRADORA DE CONSÓRCIOS Ltda., que reterá o valor necessário para quitação total de minha cota de consórcio, vencidas ou vicendas, e repassando o saldo se houver para:</p>
				<tr>
					<td align="right">
						<label>Beneficiário:</label>
					</td>
					<td align="left">
						<input type="text">
					</td>
				</tr>
				<p>Declaro ter ciência que a cobertura se iniciará a partir do dia seguinte a minha participação em assembléia do grupo ao qual me inscrevi, tenho idade inferior a 65 anos e estou em perfeitas condições de saúde, não tendo deficiência de órgãos, membros ou sentidos, ou sofrido moléstia grave nos últimos três anos, ciente de que, quaisquer omissões tornará nulo este seguro, nos termos do artigo 1444 do Código Civil Brasileiro. Obs: O seguro de vida em grupo é votado na assembléia de constituição.</p>
			</div>
			<!-- <tr>
				<td align="left">
					<input type="checkbox"> Declaro ter lido o contrato e estou de acordo com os termos.
				</td>
			</tr> -->
		<fieldset id="resumo" class="contaba">
			<h2>Seguro de vida</h2>
			<table class="Color">
				<tbody>
					<tr>
						<td align="right">
							<label>teste</label>
						</td>
						<td align="left">
							<input type="text" name="res_nome" id="res_nome" value="" >
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
		</form>
		
		<article class="valores">
			<h3>crédito: <b>R$ <?php echo $real;?></b></h3>
			<h2 class="sem_seg">Parcela:</h2>
			<h1 class="sem_seg">R$ <?php echo $res['parcela'];?></h1>
			
			<h2 class="com_seg">Parcela com seguro:</h2>
			<h1 class="com_seg">R$ <?php echo $res['parcela_com_seguro'];?></h1>
		</article>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>