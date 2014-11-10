<?php 
if(isset($_GET['errologin'])){
	echo "<div class='alert alert-error'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			<strong>Login</strong> ou <strong>Senha</strong> inválidos!
		</div>";	
}
if(isset($_GET['alterado'])){
	echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			<strong>Alterado</strong> com sucesso!
		</div>";
}
if(isset($_GET['erro'])){
	echo "<div class='alert alert-error'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			Ocorreu algum <strong>erro</strong> tente novamente!
		</div>";
}
if(isset($_GET['ok'])){
	echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
			Cadastrado com <strong>sucesso!</strong>
		</div>";
}
if(isset($_GET['excluido'])){
	echo "<div class='alert alert-success'>
	<button type='button' class='close' data-dismiss='alert'>×</button>
	<strong>Excluído</strong> com sucesso!
	</div>";
}
?>	