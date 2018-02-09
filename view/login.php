<?php 
require_once("template/header.php");
#require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>


<form method="POST">
	<div class="col-md-4 col-md-offset-4">
	<div class="page-header">
    	<h3>Login <small>de usuario</small></h3>
    </div>

	<div class="well">
		<p>Preencha os campos abaixo com E-mail e senha para entrar.</p>
	</div>

    <input type="email" name="email" placeholder="E-mail" class="form-control">
    <input type="password" name="senha" placeholder="Senha" class="form-control">
	<input type="submit" name="enviar" value="Entrar" class="btn btn-primary pull-right">

	<div class="page-header"></div>
			
			<?php 
				if (isset($_POST['enviar'])) {
			    require_once("..".DIRECTORY_SEPARATOR."config.php");
			    $usuario = new Usuario();
			    echo $usuario->entrar($_POST['email'],$_POST['senha']);
				}
			?>
	</div>
</form>

<?php require_once("template/footer.php"); ?>