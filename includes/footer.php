<footer class="rodape">
	<div class="content">
		<section>
			<h2>Sobre nós</h2>
			<figure>
				<a href="<?php echo $base_url?>"><img src="<?php echo $base_url?>images/logo.png" alt=""></a>
				<figcaption>Fruto da criatividade brasileira e instrumento fantástico na captação de poupança, o consórcio surgiu no país no início dos anos 60...<br>
					<a href="<?php echo $base_url?>o-consorcio">Continue lendo »</a></figcaption>
				</figure>
			</section>
			<section>
				<h2>Consórcios</h2>
				<ul>
					<?php 
						$sql = mysql_query("SELECT * FROM categorias_consorcios");
						while($row = mysql_fetch_array($sql)){
							if ($row['id'] == 1){
								$nlink = "carro";
							}
							if ($row['id'] == 2){
								$nlink = "imóveis";
							}
							if ($row['id'] == 3){
								$nlink = "Honda";
							}
							if ($row['id'] == 4){
								$nlink = "caminhonetes";
							}
							echo "<li><span>»</span><a href='{$base_url}categoria/{$row['id']}-{$row['slug']}'>Consórcio de $nlink</a></li>";
						}
					?>
					<li><span>»</span><a href="<?php echo $base_url?>o-consorcio">Credibilidade Servopa</a></li>
					<li><span>»</span><a href="<?php echo $base_url?>vantagens">Consórcio vantagens</a></li>
					<li><span>»</span><a href="<?php echo $base_url?>perguntas-frequentes">Perguntas frequentes</a></li>
				</ul>
			</section>
			<section>
				<h2>Atendimento</h2>
				<p>Segunda à Sexta das 08h às 18h <br>
					Sábado 09h às 12h</p>
					<h2 class="footer-h2">PAGUE COM:</h2>
					<img src="<?php echo $base_url?>images/pag.jpg" alt="">
					<h2 class="footer-h2">Receba nossos informativos</h2>
					<form method="post" action="" id="ajax_form">
						<input type="text" placeholder="Digite seu email" name="email">
						<span id="msg"></span>
						<!-- <span class="alert-ok">Email salvo com sucesso!<br></span>
						<span class="alert-erro">Erro ao salvar email!</span> -->
					</form>
				</section>
				<section>
					<h2>Contato</h2>
					<p><span>Pergunte-nos sobre suas dúvidas</span><br>
						<h3><span>(41)</span>3512-5998</h3></p>
						<p>Solicite mais informações<br>
							<a href="mailto:contato@bconsorcios.com.br?subject=Contato">contato@bconsorcios.com.br</a></p>
							<!-- <p>Social:</p>
							<a href="" class="social-fb"></a>
							<a href="" class="social-tw"></a>
							<a href="" class="social-gp"></a>
							<a href="" class="social-in"></a> -->
						</section>
						<div class="clear"></div>
						<img src="<?php echo $base_url?>images/logo.png" alt="" class="logo-rodape">
						<div class="copy">
							<p>© 2014 BConsórcios - Todos os direitos reservados.</p>
							<figure>
								<a href="http://www.ifwebs.com" target="_blank"><img src="<?php echo $base_url?>images/ifwebs.png" alt="IfWebs" title="IfWebs" style="width: 100px;"></a>
							</figure>
						</div>
						<div class="clear"></div>
						</div>
					</footer>
				</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://unslider.com/unslider.min.js"></script>
<script src="<?php echo $base_url?>js1/functions.js"></script>
<script src="<?php echo $base_url?>js1/carouFredSel/jquery.carouFredSel-6.2.1.js" type="text/javascript"></script>