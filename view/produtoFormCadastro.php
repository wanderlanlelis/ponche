<?php  
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>

<form method="POST">
	<div class="col-md-4 col-md-offset-4">
	<div class="page-header">
    	<h3>Cadastro <small>de produto</small></h3>
    </div>

	<div class="well">
		<p>Preencha os campos abaixo para cadastrar um novo produto.</p>
	</div>

	<input type="text" name="nome" placeholder="Nome" class="form-control" required>
	<input type="text" name="descricao" placeholder="Descrição" class="form-control" required>
    <select name="embalagem" class="form-control" required>
    	<option value="" disabled selected>Tipo de embalagem</option>
    	<option value="Tradicional">Tradicional</option>
    	<option value="Presente">Presente</option>
    	<option value="Personalizada">Personalizada</option>
    </select>
    <input type="number" name="peso" placeholder="Peso em gramas" class="form-control" min="1" step="any" required>
    <select name="linha" class="form-control" required>
    	<option value="" disabled selected>Linha</option>
    	<option value="alcoólico">alcoólico</option>
    	<option value="cesta">cesta</option>
    	<option value="gourmet">gourmet</option>
    	<option value="promocões">promocões</option>
    </select>
    <input type="tel" placeholder="R$" required="required" maxlength="15" name="valor" pattern="([0-9]{1.3}\.)?[0-9]{1.3},[0-9]{2}$" class="form-control" required/>
    <input type="file" name="foto" class="form-control">
    <select name="status" class="form-control" required>
    	<option value="" disabled selected>Selecione o status</option>
    	<option value="1">Ativo</option>
    	<option value="0">Inativo</option>	
    </select>
	<input type="submit" name="enviar" value="Cadastrar" class="btn btn-primary pull-right" required>

	<div class="page-header"></div>
			
			<?php 
				/* insere dados na entidade de produto*/
				if (isset($_POST['enviar'])) {
				    $produto = new Produto();
				    $produto->setNome($_POST['nome']);
				    $produto->setDescricao($_POST['descricao']);
				    $produto->setEmbalagem($_POST['embalagem']);
				    $produto->setPeso($_POST['peso']);
				    $produto->setLinha($_POST['linha']);
				    $produto->setValor($_POST['valor']);
				    $produto->setFoto($_POST['foto']);
				    $produto->setStatus($_POST['status']);
				    echo $produto->inserir();
				}			
			?>
	</div>
</form>

<?php require_once("template/footer.php"); ?>