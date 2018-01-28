m<?php
session_start();
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>


<?php
$id 		= base64_decode($_GET['value']);
$produto 	= new Produto();
$resultado  = $produto->pesquisarID($id);

foreach ($resultado as $row) {

  	$_SESSION['nome'] 		= $row['nome'];				          	
  	$_SESSION['descricao']  = $row['descricao'];
  	$_SESSION['embalagem']  = $row['embalagem'];
  	$_SESSION['peso']  		= $row['peso'];
  	$_SESSION['linha']  	= $row['linha'];
  	$_SESSION['valor'] 		= $row['valor'];
  	$_SESSION['foto'] 		= $row['foto'];
  	$_SESSION['status']     = $row['status'];
  	$_SESSION['id']			= $row['id'];
}			
?>

<form method="POST">
	<div class="col-md-4 col-md-offset-4">
	<div class="page-header">
    	<h3>Edição <small>de produto</small></h3>
    </div>

	<div class="well">
		<p>Preencha os campos abaixo para edição do registro.</p>
	</div>

	<input type="text" name="nome" value="<?php echo $_SESSION['nome']?>" class="form-control" required>
	<input type="text" name="descricao" value="<?php echo $_SESSION['descricao']?>" class="form-control" required>
    <input type="number" name="peso" value="<?php echo $_SESSION['peso']?>" class="form-control" min="1" step="any" required>
    <input type="amount" value="<?php echo $_SESSION['valor']?>" required="required" maxlength="15" name="valor" pattern="([0-9]{1.3}\.)?[0-9]{1.3},[0-9]{2}$" class="form-control" required/>
    <input type="file" name="foto" value="<?php echo $_SESSION['foto']?>" class="form-control">
    <select name="status" class="form-control" required>
    	<option value="" disabled selected>Selecione o status</option>
    	<option value="1">Ativo</option>
    	<option value="0">Inativo</option>	
    </select>
	<input type="submit" name="enviar" value="Atualizar" class="btn btn-primary pull-right" required>

	<div class="page-header"></div>
	<?php
	/* Atualiza os registros no banco*/
	if (isset($_POST['enviar'])) {
	    $produto = new Produto();
	    $produto->setNome($_POST['nome']);
	    $produto->setDescricao($_POST['descricao']);
	    $produto->setPeso($_POST['peso']);
	    $produto->setValor($_POST['valor']);
	    $produto->setFoto($_POST['foto']);
	    $produto->setStatus($_POST['status']);
	    echo $produto->atualizar($_SESSION['id']);
	    echo "<meta http-equiv='Refresh' content='2' url=produtoFormPesquisa.php>";
	}
	?>
	</div>
</form>

<!--rodape-->
<?php require_once("template/footer.php"); ?>