 <header class="header">
	<div class="content">
	<a href="#menuMobile" class="btnMenu"><img src="<?php echo $base_url?>images/btn-menu.png" alt="" /></a>
		<figure class="logo">
			<a href="<?php echo $base_url?>"><img src="<?php echo $base_url?>images/logo.png" alt=""></a>
		</figure>
		<nav class="menu">
			<ul>
				<li <?php echo($pg=='')?'class="active"':'';?>><a href="<?php echo $base_url?>">Home</a></li>
				<li <?php echo($pg=='o-consorcio')?'class="active"':'';?> <?php echo($pg=='quem-somos')?'class="active"':'';?>><a href="#">Cons�rcio Servopa</a>
					<ul>
						<li><a href="<?php echo $base_url?>quem-somos">Representante Autorizado</a></li>
						<li><a href="<?php echo $base_url?>o-consorcio">Credibilidade Servopa</a></li>
					</ul>
				</li>
				<li <?php echo($pg=='perguntas-frequentes')?'class="active"':'';?>><a href="#">Cons�rcios</a>
					<ul>
						<?php 
						$sql = mysql_query("SELECT * FROM categorias_consorcios");
						while($row = mysql_fetch_array($sql)){
							if ($row['id'] == 1){
								$nlink = "carro";
							}
							if ($row['id'] == 2){
								$nlink = "im�veis";
							}
							if ($row['id'] == 3){
								$nlink = "Honda";
							}
							if ($row['id'] == 4){
								$nlink = "Caminhonetes";
							}
							echo "<li><a href='{$base_url}categoria/{$row['id']}-{$row['slug']}'>Cons�rcio de $nlink</a></li>";
						}
					?>
						<li><a href="<?php echo $base_url?>perguntas-frequentes">Perguntas frequentes</a></li>
					</ul>
				</li>
				<li <?php echo($pg=='vantagens')?'class="active"':'';?>><a href="<?php echo $base_url?>vantagens">Vantagens</a></li>
				<li <?php echo($pg=='contato')?'class="active"':'';?>><a href="<?php echo $base_url?>contato">Contato</a></li>
			</ul>
		</nav>
		<div class="fone-menu">
			<p>Ligue Agora!</p>
			<h1><span>(41)</span> 3512 - 5998</h1>
		</div>
	</div>
</header>
<div class="menuMobile" id="menuMobile">
		<ul>
			<li><a href="<?php echo $base_url?>">Home</a></li>
			<li><a href="#">Cons�rcio Servopa</a></li>
			<li class="subitem"><a href="<?php echo $base_url?>o-consorcio">Credibilidade Servopa</a></li>
			<li class="subitem"><a href="<?php echo $base_url?>quem-somos">Representante Autorizado</a></li>
			<li><a href="<?php echo $base_url?>produtos">Cons�rcios</a></li>
			<li class="subitem"><a href="http://www.bconsorcios.com.br/categoria/1-automovel">Cons�rcio de carro</a></li>
			<li class="subitem"><a href="http://www.bconsorcios.com.br/categoria/2-imovel">cons�rcio de Im�veis</a></li>
			<li class="subitem"><a href="http://www.bconsorcios.com.br/categoria/3-moto">cons�rcio de Honda</a></li>
			<li class="subitem"><a href="http://www.bconsorcios.com.br/categoria/4-caminhao">cons�rcio de Caminhonetes</a></li>
			<li class="subitem"><a href="<?php echo $base_url?>perguntas-frequentes">Perguntas frequentes</a></li>
			<li><a href="<?php echo $base_url?>vantagens">Vantagens</a></li>
			<li><a href="<?php echo $base_url?>contato">Contato</a></li>
		</ul>
	</div>
	<!-- /.menuMobile -->