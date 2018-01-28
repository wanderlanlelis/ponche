<?php  
error_reporting(0);
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>

<form method="POST">
	<div class="col-md-4 col-md-offset-4">
	<div class="page-header">
    	<h3>Pesquisa <small>de produto</small></h3>
    </div>

	<div class="well">
		<p>Informe no campo abaixo o nome do produto, caso queira pesquisar por todos os produtos cadastrados deixe o campo nome em branco.</p>
	</div>

    <input type="text" name="nome" placeholder="nome" class="form-control">
	<input type="submit" name="enviar" value="Procurar" class="btn btn-primary pull-right">

	<div class="page-header"></div>
	</div>
</form>

<div class="col-md-8 col-md-offset-2">
<?php 

	$id = $_GET['value'];
	if ($_GET['a'] == "apagar") {

		$produto = new Produto();
		echo $produto->desativar(base64_decode($id));
		header("refresh:2;url=produtoFormPesquisa.php");

	} else {
		if (isset($_POST['enviar'])) {

	    $like = $_POST['nome'];
	    $produto = new Produto();

	    if ($like) {
	    	$resultado = $produto->searchLike($like);

	    }else $resultado = $produto->pesquisar();
	    		echo
	          	"<div class='row'>
		        <div class='table-responsive'>
		        <table class = 'table table-striped'>
		        <thead>
			        <tr>
				        <th>Nome</th>
				        <th>Descrição</th>
				        <th>Embalagem</th>
				        <th>Peso</th>
				        <th>Linha</th>
				        <th>Valor</th>
				        <th>Status</th>
				        <th>Ações</th>
			        </tr>
		        </thead>";

	            foreach ($resultado as $row) {

	          	$nome   	= $row['nome'];
	          	$descricao  = $row['descricao'];
	          	$embalagem 	= $row['embalagem'];
	          	$peso 		= $row['peso'];
	          	$linha 		= $row['linha'];
	          	$valor 		= $row['valor'];
	          	$status 	= $row['status'];
	          	$id     	= $row['id'];



	          	if ($status == 1 ) { 
	          		$info_status = "Ativo";
	          	}else $info_status = "Inativo";

	          	echo
	          	"
		        <tr>
			        <td>".$nome."</td>
			        <td>".$descricao."</td>
			        <td>".$embalagem."</td>
			        <td>".$peso." gramas</td>
			        <td>".$linha."</td>
			        <td>R$ ".$valor."</td>
			        <td>".$info_status."</td>

			        <td><a href='produtoFormEditar.php?a=editar&value=".base64_encode($id)." '>
					<input type='submit' class='btn btn-primary btn-xs' value='Editar'></a></td>

					<td><a href='?a=apagar&value=".base64_encode($id)." '>
					<input type='submit' class='btn btn-danger btn-xs' value='Apagar'></a></td>
		          </tr>";

		        echo 
		        "
		        </div>
		        </div>";
	          }
	}
		
	}
	
	
?>
</div>
<?php require_once("template/footer.php"); ?>