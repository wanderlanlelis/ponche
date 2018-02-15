<?php 
require_once("template/header.php");
#require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>

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
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    	
<!--
<div class="row navbar-inverse">
	<div class="col-md-7 col-md-offset-1">
		<a class="navbar-brand" href="index.php">PONCHE. <small>Geting financial health</small></a>
	</div>

	<div class="col-md-4">teste</div>
</div>
-->


<div class="row">
	<div class="col-md-5 col-md-offset-1">
		
		<h3><strong>Financial health</strong></h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mi fermentum mauris euismod eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin volutpat a odio ut scelerisque. Sed nec rutrum odio. Fusce non odio scelerisque, placerat diam nec, aliquam nunc. Maecenas venenatis quis enim sed tincidunt. Ut ultricies tincidunt augue, a luctus dolor pellentesque eu. Curabitur dui velit, vestibulum nec posuere a, interdum ut ante. Phasellus eget imperdiet quam. Sed vestibulum convallis metus, blandit ultricies enim mattis lacinia.</p>

		<p>Suspendisse vel tincidunt nisl. Nunc fringilla pulvinar sem tempus ultricies. Etiam tempor tincidunt velit, sed porta nulla tempus ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis augue ut efficitur malesuada. Proin aliquet malesuada arcu, ut ullamcorper magna eleifend sed. In ultrices justo sit amet libero rutrum maximus.</p>

		<p><strong>Foram gerados 2 parágrafos, 135 palavras e 941 bytes de Lorem Ipsum</strong></p>
	</div>


	<div class="col-md-3 col-md-offset-2">
		
		<form method="POST"><!--inicio do formulario-->
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
					    $usuario->setemail($_POST['email']);
					    $usuario->setSenha($_POST['senha']);
					    echo $usuario->entrar();
						}
					?>
		</form><!--fim do formulario-->

	</div>
</div>

<?php require_once("template/footer.php"); ?>



