<?php 
session_start();
require_once("template/header.php");
require_once("template/nav.php");
 ?>

    

<div class="container theme-showcase" role="main">
	<div class="page-header"><br>
    	<h3>Dashboard  <small>Pagina inicial</small></h3>
    </div>
	<p>logado como: <?php echo $_SESSION['nome']; ?> </p>
</div> <!-- /container -->

<?php 
require_once("template/footer.php");
 ?>

