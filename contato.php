<?php

if (isset($_POST['submit']) && ($_POST['submit']=='Enviar')){

	include("phpmailer/class.phpmailer.php");

	$mail = new PHPMailer();

	$nome = strip_tags(htmlentities($_POST['nome'], ENT_QUOTES,'UTF-8'));
	$email = strip_tags($_POST['email']);
	$telefone = strip_tags($_POST['telefone']);
	$atendimento = strip_tags($_POST['atendimento']);
	$interesse = strip_tags($_POST['interesse']);
	$mensagem = $_POST['mensagem'];

	$assunto = "Contato enviado pelo WebSite";

	$mensagemHTML  = '<p>Nome: '.$nome.'</p>';
	$mensagemHTML .= '<p>E-mail: '.$email.'</p>';
	$mensagemHTML .= '<p>Telefone: '.$telefone.'</p>';
	$mensagemHTML .= '<p>Atendimento: '.$atendimento.'</p>';
	$mensagemHTML .= '<p>Interesse: '.$interesse.'</p>';
	$mensagemHTML .= '<p>Mensagem: '.$mensagem.'</p>';
	$mensagemHTML .= '<p>Data: '.date("d/m/Y H:i").'</p>';

	//$mail->IsSMTP(); // mandar via SMTP
	/* $mail->Host = "smtp.mail.yahoo.com.br"; // Seu servidor smtp
	$mail->SMTPAuth = true; // smtp autenticado
	$mail->Port = 465; // porta de comunicacao
	$mail->Username = ""; // usuÃ¡rio deste servidor smtp
	$mail->Password = ""; // senha */

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
		echo '<script>alert("Mensagem enviada com sucesso!")</script>';
	}else{
		echo '<script>alert("Erro ao enviar a mensagem!")</script>';

	}
}

?>
<!doctype html>
<html lang="pt-br">
<hea>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>(41)3512 - 5998 Entre em contato - Consórcio Servopa Curitiba</title>

<meta name="keywords" content="consorcio de carro em curitiba, consorcio de imovel em curitiba, consorcio de moto em curitiba, consorcio de caminhao em curitiba" />
<meta name="description" content="Consórcio Servopa Curitiba, consórcio de carro, consórcio de imóvel, consórcio de moto, consórcio de caminhão" />


<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<bod
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="contato content wrap-content">
		<h1>Contato</h1>
		<p>Ol&aacute;, se voc&ecirc; tem alguma d&uacute;vida ou precisa de alguma informa&ccedil;&atilde;o para a defini&ccedil;&atilde;o do seu plano do cons&oacute;rcio, deixe nos ajudar.</p> 
		<p>Envie uma mensagem e entraremos em contato o mais r&aacute;pido poss&iacute;vel.</p> 
		<p>Ser&aacute; um prazer atend&ecirc; lo!</p>
		<form action="" enctype="multipart/form-data" method="post" id="contato" class="contato">
				<label>Nome</label>
				<input name="nome" placeholder="Seu Nome" required="required">

				<label>Email</label>
				<input name="email" type="email" placeholder="fulano@mail.com">

				<label>Telefone</label>
				<input name="telefone" type="text" placeholder="(xx)xx-xx-xx-xx">

				<label>Interesse</label>
				<input name="interesse" type="text" placeholder="Carro, caminh&atilde;o, moto, im&oacute;vel... ">

				<label>Horario de atendimento</label>
				<input name="atendimento" type="text" placeholder="Em que horario podemos entrar em contato? Manh&atilde;, tarde ou noite?">

				<label>Mensagem</label>
				<textarea name="mensagem" placeholder="Escreva sua mensagem"></textarea>
				<br>
				<br>
				<input id="submit" name="submit" type="submit" value="Enviar">
			</form>
		<div class="clear">	</div>
		</section>
		<div class="clear"></div>
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>