<?php

if (isset($_POST['submit']) && ($_POST['submit']=='Enviar')){

	include("phpmailer/class.phpmailer.php");
	
	$mail = new PHPMailer();
	
	$nome = strip_tags(htmlentities($_POST['nome'], ENT_QUOTES,'UTF-8'));
	$email = strip_tags($_POST['email']);
	$telefone = strip_tags($_POST['telefone']);
	$mensagem = strip_tags(htmlentities($_POST['mensagem'], ENT_QUOTES,'UTF-8'));
	
	$assunto = "Contato enviado pelo WebSite";
	
	$mensagemHTML  = '<p>Nome: '.$nome.'</p>';
	$mensagemHTML .= '<p>E-mail: '.$email.'</p>';
	$mensagemHTML .= '<p>Telefone: '.$telefone.'</p>';
	$mensagemHTML .= '<p>Mensagem: '.$mensagem.'</p>';
	$mensagemHTML .= '<p>Data: '.date("d/m/Y H:i").'</p>';
		
	$mail->IsSMTP(); // mandar via SMTP
	/* $mail->Host = "smtp.mail.yahoo.com.br"; // Seu servidor smtp
	$mail->SMTPAuth = true; // smtp autenticado
	$mail->Port = 465; // porta de comunicacao
	$mail->Username = ""; // usuÃ¡rio deste servidor smtp
	$mail->Password = ""; // senha */
	
	$mail->FromName = $nome;
	$mail->SetLanguage( 'br', 'phpmailer/language/' ); // Carrega o idioma
	$mail->From = "{$email}";
	$mail->AddAddress('fred_chien@yahoo.com.br');
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consórcio Servopa Curitiba</title>

<meta name="keywords" content="" /> 
<meta name="description" content="" />

<?php include 'includes/head.php';?>
<?php require_once 'includes/conexao.php';?>
</head>
<body>
	<div class="all">
		<?php include 'includes/header.php';?>
		<div class="clear"></div>
		<section class="contato content">
		<h1>Contato</h1>	
		<form action="" enctype="multipart/form-data" method="post" id="contato" class="contato">
				<label>Nome</label>
				<input name="nome" placeholder="Seu Nome" required="required">
						
				<label>Email</label>
				<input name="email" type="email" placeholder="fulano@mail.com">
				
				<label>Telefone</label>
				<input name="telefone" type="text" placeholder="(xx)xx-xx-xx-xx">
				
				<label>Mensagem</label>
				<textarea name="mensagem" placeholder="Escreva sua mensagem"></textarea>
				<br>		
				<br>		
				<input id="submit" name="submit" type="submit" value="Enviar">	
			</form>
		<div class="clear">	</div>
		</section>
		
		<hr>
		<?php include 'includes/footer.php';?>
</body>
</html>