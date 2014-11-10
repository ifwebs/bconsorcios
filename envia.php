<?php

	include("phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	
	
	$tipo = $_POST['tipo'];
	$nome = strip_tags(htmlentities($_POST['nome'], ENT_QUOTES,'UTF-8'));
	$email = strip_tags($_POST['email']);
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$estadoem = $_POST['estadoem'];
	$sexo = $_POST['sexo'];
	$nascimento = $_POST['nascimento'];
	$estcivil = $_POST['estcivil'];
	$profissao = $_POST['profissao'];
	$renda = $_POST['renda'];
	$naturalidade = $_POST['naturalidade'];

	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$estado = strip_tags($_POST['estado']);
	$cidade = strip_tags($_POST['cidade']);
	$cep = $_POST['cep'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	
	$ruaC = $_POST['ruaC'];
	$bairroC = $_POST['bairroC'];
	$estadoC = $_POST['estadoC'];
	$cidadeC = $_POST['cidadeC'];
	$cepC = $_POST['cepC'];
	$telefoneC = $_POST['telefoneC'];
	//$celularC = $_POST['celularC'];
	$cepC = $_POST['cepC'];

	$cpfBem = $_POST['cpfBem'];

	$prazo = $_POST['prazo1'];
	$categoria = $_POST['cat1'];
	$parcela_reduzida = $_POST['parcela_reduzida1'];
	$com_seguro = $_POST['com_seguro1'];
	$end_cobranca = $_POST['end_cobranca1'];
	$descricao_bem = $_POST['descricao_bem'];

	$preco_final = $_POST['preco_final'];

	//credito
	$cre = $_POST['cre'];
	//parcela
	$parc = $_POST['parc'];
	//parcela com seguro
	$parc_com_seguro = $_POST['parc_com_seguro'];
	//parcela reduzida
	$parc_reduzida = $_POST['parc_reduzida'];
	//parcela reduzida com seguro
	$parc_reduzida_com_seguro = $_POST['parc_reduzida_com_seguro'];

	if($preco_final == 'PSS'){
		$prec_fim = $parc;
	}elseif ($preco_final == 'PCS') {
		$prec_fim = $parc_com_seguro;
	}elseif ($preco_final == 'PRSS') {
		$prec_fim = $parc_reduzida;
	}elseif ($preco_final == 'PRCS') {
		$prec_fim = $parc_reduzida_com_seguro;
	}else{
		$prec_fim = $parc;
	}
	
	$assunto = "Ficha de compra enviada pelo Site";

	$mensagemHTML  = '<p>Tipo: '.$tipo.'</p>';
	$mensagemHTML .= '<p>Nome: '.$nome.'</p>';
	$mensagemHTML .= '<p>E-mail: '.$email.'</p>';
	$mensagemHTML .= '<p>CPF: '.$cpf.'</p>';
	$mensagemHTML .= '<p>RG: '.$rg.'</p>';
	$mensagemHTML .= '<p>Estado Emissor: '.$estadoem.'</p>';
	$mensagemHTML .= '<p>Sexo: '.$sexo.'</p>';
	$mensagemHTML .= '<p>Data de Nascimento: '.$nascimento.'</p>';
	$mensagemHTML .= '<p>Estado Civil: '.$estcivil.'</p>';
	$mensagemHTML .= '<p>Profissão: '.$profissao.'</p>';
	$mensagemHTML .= '<p>Renda: '.$renda.'</p>';
	$mensagemHTML .= '<p>Natural de: '.$naturalidade.'</p>';
	$mensagemHTML .= '<h1>Residencial</h1>';
	$mensagemHTML .= '<p>Rua: '.$rua.'</p>';
	$mensagemHTML .= '<p>Bairro: '.$bairro.'</p>';
	$mensagemHTML .= '<p>Estado: '.$estado.'</p>';
	$mensagemHTML .= '<p>Cidade: '.$cidade.'</p>';
	$mensagemHTML .= '<p>CEP: '.$cep.'</p>';
	$mensagemHTML .= '<p>Telefone: '.$telefone.'</p>';
	$mensagemHTML .= '<p>Celular: '.$celular.'</p>';
	$mensagemHTML .= '<h1>Comercial</h1>';
	$mensagemHTML .= '<p>Rua: '.$ruaC.'</p>';
	$mensagemHTML .= '<p>Bairro: '.$bairroC.'</p>';
	$mensagemHTML .= '<p>Estado: '.$estadoC.'</p>';
	$mensagemHTML .= '<p>Cidade: '.$cidadeC.'</p>';
	$mensagemHTML .= '<p>CEP: '.$cepC.'</p>';
	$mensagemHTML .= '<p>Telefone: '.$telefoneC.'</p>';
	$mensagemHTML .= '<p>Celular: '.$celularC.'</p>';
	$mensagemHTML .= '<h1>Seguro de Vida</h1>';
	$mensagemHTML .= '<p>Nome e CPF: '.$cpfBem.'</p>';
	$mensagemHTML .= '<h1>Resumo</h1>';
	$mensagemHTML .= '<p>Prazo: '.$prazo.'</p>';
	$mensagemHTML .= '<p>Categoria: '.$categoria.'</p>';
	$mensagemHTML .= '<p>Parcela reduzida?: '.$parcela_reduzida.'</p>';
	$mensagemHTML .= '<p>Parcela com Seguro?: '.$com_seguro.'</p>';
	$mensagemHTML .= '<p>Endereco para cobranca: '.$end_cobranca.'</p>';
	$mensagemHTML .= '<p>Descricao: '.$descricao_bem.'</p>';
	$mensagemHTML .= '<p>Preço Final:R$: '.$prec_fim.'</p>';
	$mensagemHTML .= '<p>Data: '.date("d/m/Y H:i").'</p>';
	
	$mail->FromName = $nome;
	$mail->SetLanguage( 'br', 'phpmailer/language/' ); // Carrega o idioma
	$mail->From = "{$email}";
	$mail->AddAddress('contato@bconsorcios.com.br');
	//$mail->AddCC($email);
	//Endereço de resposta
	$mail->AddReplyTo($email);
	$mail->WordWrap = 50; // set word wrap
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = '=?ISO-8859-1?B?' . base64_encode($assunto) . '?=';
	$mail->Body = utf8_encode($mensagemHTML);

	if($mail->Send()){
		require_once 'PagSeguroLibrary/PagSeguroLibrary.php';
 
/** INICIO PROCESSO PAGSEGURO */
$paymentrequest = new PagSeguroPaymentRequest();
$leng = strlen($prec_fim);

 if($leng>6){
 	$valor = str_replace(".","",$prec_fim);
 	$valor = str_replace(",",".",$valor);
 }
 else{
 	$valor = str_replace(",",".",$prec_fim);
 }
$data = Array(
 'id' => '01', // identificador
 'description' => "1ª parcela do consórcio", // descrição
 'quantity' => 1, // quantidade
 'amount' => $valor // valor unitário
);
$item = new PagSeguroItem($data);
/* $paymentRequest deve ser um objeto do tipo PagSeguroPaymentRequest */
 
$paymentrequest->addItem($item);
//Definindo moeda
$paymentrequest->setCurrency('BRL');
 
// 1- PAC(Encomenda Normal)
// 2-SEDEX
// 3-NOT_SPECIFIED(Não especificar tipo de frete)
$paymentrequest->setShipping(3);
//Url de redirecionamento
//$paymentrequest->setRedirectURL($redirectURL);// Url de retorno
 
$credentials = PagSeguroConfig::getAccountCredentials();//credenciais do vendedor
 
//$compra_id = App_Lib_Compras::insert($produto);
//$paymentrequest->setReference($compra_id);//Referencia;
 
$url = $paymentrequest->register($credentials);
 
header("Location: $url");
//echo '<script language= "JavaScript">location.href="$url"</script>'."\n";
	}else{
		echo '<script>alert("Erro ao enviar a mensagem!")</script>';

	}




?>