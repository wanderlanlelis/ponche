<?php 
require_once("template/header.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>
<div class="page-header"></div>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
          	</button>
          	<a class="navbar-brand" href="#">PONCHE. <small>Geting financial health</small></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          	<form method="POST" class="navbar-form navbar-right">
	            <div class="form-group"><input type="email" placeholder="Email" name="email" class="form-control"></div>
	            <div class="form-group"><input type="password" placeholder="Senha" name="senha" class="form-control"></div>
	            <input type="submit" name="enviar" value="Entrar" class="btn btn-primary pull-right">
          	</form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<?php 
if (isset($_POST['enviar'])) {
    require_once("..".DIRECTORY_SEPARATOR."config.php");
    $usuario = new Usuario();
    $usuario->setemail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    echo 
    "<div class='col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 alert alert-info'>"
    	.$usuario->entrar().
    "</div>"; }
?>

<div class="vertical-space-x"></div>
<div class="row">
	<div class="col-md-5 col-md-offset-1 col-xs-10 col-xs-offset-1">		
		<h3><strong>Financial health</strong></h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mi fermentum mauris euismod eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin volutpat a odio ut scelerisque. Sed nec rutrum odio. Fusce non odio scelerisque, placerat diam nec, aliquam nunc. Maecenas venenatis quis enim sed tincidunt. Ut ultricies tincidunt augue, a luctus dolor pellentesque eu. Curabitur dui velit, vestibulum nec posuere a, interdum ut ante. Phasellus eget imperdiet quam. Sed vestibulum convallis metus, blandit ultricies enim mattis lacinia.</p>
		<p><strong>Foram gerados 2 parágrafos, 135 palavras e 941 bytes de Lorem Ipsum</strong></p>
	</div>

	<div class="col-md-3 col-md-offset-2 col-xs-10 col-xs-offset-1">		
		<form method="POST">
			<div>
		    	<h3>Cadastre-se<br>
		    		<small>Experimente essa nova fase.</small>
		    	</h3>
		    </div>
			<input type="text" name="nome" placeholder="Nome" class="form-control">
		    <input type="email" name="email" placeholder="E-mail" class="form-control">
		    <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
		    <input type="password" name="confirm-senha" id="Confirmacao" placeholder="Confirmação de senha" class="form-control"><br>		    
			<input type="submit" name="enviar-cadastro" value="Cadastre-se" class="btn btn-primary form-control col-md-5" onclick="validarSenha()">
		</form><!--fim do formulario de cadastro-->
	</div>
	<?php
	if (isset($_POST['enviar-cadastro'])) {
	    require_once("..".DIRECTORY_SEPARATOR."config.php");
	    $usuario = new Usuario();
	    $usuario->setnome($_POST['nome']);
	    $usuario->setemail($_POST['email']);
	    $usuario->setSenha($_POST['senha']);
	    $usuario->setcontraSenha($_POST['confirm-senha']);
	    echo 
	    "<div class='col-md-3 col-md-offset-2 col-xs-10 col-xs-offset-1 float-right alert alert-info'>"
	    	.$usuario->inserir().
	    "</div>"; }
	?>
</div>
<?php require_once("template/footer.php"); ?>
