<?php 
require_once("template/header.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">PONCHE. <small>Get financial health</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>
    <form method="POST" class="form-inline my-2 my-lg-0 pull-right">
      <input class="form-control mr-sm-2" type="text" name="email" placeholder="E-mail">
      <input class="form-control mr-sm-2" type="password" name="senha" placeholder="Senha">
      <input type="submit" name="enviar" value="Entrar" class="btn btn-outline-primary my-2 my-sm-0">
    </form>
  </div>
</nav>

<?php 
if (isset($_POST['enviar'])) {
    require_once("..".DIRECTORY_SEPARATOR."config.php");
    $usuario = new Usuario();
    $usuario->setemail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    echo 
    "<div class='col-md-12 col-xs-10 col-xs-offset-1 alert alert-info'>"
    	.$usuario->entrar().
    "</div>"; }
?>


<div class="row justify-content-md-center">
	<div class="col-md-10 col-sm-10" >
		<div class="vertical-space-m"></div>
		<div class="row">
			<div class="col-md col-md-offset-1 col-xs-10 col-xs-offset-1">		
				<h3><strong>Financial health</strong></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mi fermentum mauris euismod eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin volutpat a odio ut scelerisque. Sed nec rutrum odio. Fusce non odio scelerisque, placerat diam nec, aliquam nunc. Maecenas venenatis quis enim sed tincidunt. Ut ultricies tincidunt augue, a luctus dolor pellentesque eu. Curabitur dui velit, vestibulum nec posuere a, interdum ut ante. Phasellus eget imperdiet quam. Sed vestibulum convallis metus, blandit ultricies enim mattis lacinia.</p>
				<p><strong>Foram gerados 2 parágrafos, 135 palavras e 941 bytes de Lorem Ipsum</strong></p>
			</div>

			<div class="col-md-4 col-md-offset-1 col-xs-10 col-xs-offset-1">		
				<form method="POST">
					<div>
				    	<h3>Cadastre-se<br>
				    		<small>Experimente essa nova fase.</small>
				    	</h3>
				    </div>
					<input type="text" name="nome" placeholder="Nome" class="form-control">
				    <input type="email" name="email" placeholder="E-mail" class="form-control">
				    <small class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém..</small>		    
				    <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
				    <input type="password" name="confirm-senha" id="Confirmacao" placeholder="Confirmação de senha" class="form-control"><br>		    
					<input type="submit" name="enviar-cadastro" value="Cadastre-se" class="btn btn-primary btn-block" onclick="validarSenha()">
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
