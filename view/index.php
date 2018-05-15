<?php
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>	

<div class="container theme-showcase" role="main">
	<div class="page-header"><br>
   	<h3>Dashboard</h3>
  </div>
	<p>logado como: <?php echo $_SESSION['nome']; ?> </p>


	<?php #<!-- List group -->
        $relatorio = new Relatorio();
        $resultado = $relatorio->painel($_SESSION['id']);

        foreach ($resultado as $row) {
        	$GLOBALS['entrada'] = $row['entrada'];
        	$GLOBALS['saida'] = $row['saida'];
        	$GLOBALS['saldo'] = $row['saldo'];
        }
    ?>

<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Entrada</div>
  <div class="card-body">
    <h5 class="card-title">R$ <?php echo $entrada ?></h5>
    <p class="card-text">
    	Mais detalhes <a href=""><button type="button"
    	 class="btn btn-light">mais</button></a>
    </p>
  </div>
</div>

<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Saida</div>
  <div class="card-body">
    <h5 class="card-title">R$ <?php echo $saida ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Saldo</div>
  <div class="card-body">
    <h5 class="card-title">R$ <?php echo $saldo ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

</div> <!-- /container -->
<?php require_once("template/footer.php"); ?>

