<?php
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
#error_reporting(0);
?>	

<div class="col-md-8 col-md-offset-2" >
	<div class="page-header"><br>
    	<h3>Configurar <small>dependente</small></h3>
    </div>

	<div class="alert alert-silver alert-dismissible" role="alert">
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  		<span aria-hidden="true">&times;</span>
	  	</button> 	
	  	<strong>Informação!</strong><p>Você pode fazer um cadastro clicando no botão abaixo.</p>
	</div>

	<p><!-- Large modal - abre o formulario de cadastro -->
		<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">
			Cadastrar
		</button>
	</p>
			
	<?php #<!-- List group -->
        $dependente = new Dependente();
        $dependente->setusuario_id($_SESSION['id']);
        $resultado = $dependente->pesquisarByUser();

        if ($resultado) {
			echo "
        	<div class='panel panel-default'>			  
			<div class='panel-heading'>Contas cadastradas</div>";
	        foreach ($resultado as $row) 
	        {
	        	echo "
	        		<div class='col-md'>
	        			<li class='list-group-item'>".$row['nome']."
	        				<a href='?a=del&id=".$row['id']." ''>
	        				<button class='btn btn-danger btn-xs pull-right'>Apagar</button>
	        				</a>
	        			</li>
	        		</div>";
	        } 
        }else echo "
			<div class='alert alert-danger' role='alert'>
				<p>Nenhum registro encontrado!</p>
			</div>";                      
    ?>
</div>

<!-- Large modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-md" role="document">
  	<div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
        	</button>
        <h4 class="modal-title">Cadastro <small>de dependente</small></h4>
    	</div>
    	<div class="modal-body">

			<div class="well" role="alert"><p>Preencha o(s) campo(s) abaixo para cadastrar.</p></div>

			<form method="POST">
			<input type="text" name="nome" placeholder="Nome" class="form-control" required="">

			<?php
			if (isset($_POST['enviar'])) {
			    $dependente = new Dependente();
			    $dependente->setusuario_id($_SESSION['id']);
					$dependente->setnome($_POST['nome']);
			    $dependente->inserir();
			    echo "<meta http-equiv='refresh' content=0, url=?'>";
			}			
			?>

      </div><!--fim do modal-body-->
      <div class="modal-footer">
      		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      		<input type="submit" name="enviar" value="Cadastrar" class="btn btn-primary">
    	</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php require_once("template/footer.php"); ?>

<?php
if (isset($_GET['a']) ) {
    $dependente = new Dependente();
    $dependente->desativar($_GET['id']);
    echo "<meta http-equiv='refresh' content='0, url=?'>";
}			
?>


