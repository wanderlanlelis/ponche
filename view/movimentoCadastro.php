<?php
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
error_reporting(0);
#session_start();
?>

<form method="POST">
	<div class="col-md-4 col-md-offset-4">
	<div class="page-header"><br>
    	<h3>Cadastro <small>de movimentação</small></h3>
    </div>

	<div class="well">
		<p>Preencha os campos abaixo para cadastrar uma nova transação.</p>
	</div>

    <select name="conta" class="form-control" required>
    	<option value="" disabled selected>Selecione uma conta</option>
    	<?php
	        $conta = new Conta();
	        $conta->setusuario_id($_SESSION['id']);
	        $resultado = $conta->pesquisarByUser();
	        foreach ($resultado as $row) {
	            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
	        }                       
	    ?>
    </select>

    <select name="tipo" class="form-control" required>
    	<option value="" disabled selected>Selecione o tipo</option>
    	<?php
	        $tipo = new Tipo();
	        $resultado = $tipo->pesquisar();
	        foreach ($resultado as $row) {
	            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
	        }                       
	    ?>
    </select>
    </select>

    <select name="categoria" class="form-control" required>
    	<option value="" disabled selected>Selecione uma categoria</option>
    	<?php
	        $categoria = new Categoria();
	        $resultado = $categoria->pesquisar();
	        foreach ($resultado as $row) {
	            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
	        }                       
	    ?>
    </select>

    <select name="subcategoria" class="form-control" required>
    	<option value="" disabled selected>Selecione uma subcategoria</option>
    	<?php
	        $subcategoria = new Subcategoria();
	        $resultado = $subcategoria->pesquisar();
	        foreach ($resultado as $row) {
	            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
	        }                       
	    ?>
    </select>

    <input type="text" name="descricao" placeholder="Descricao" class="form-control" required>
    <input type="tel" placeholder="Valor (R$)" required="required" maxlength="15" name="valor" class="form-control" required/>

    <!--Botão para exibir mais campos do formulario-->
    <button type="button" onclick="dependente_show('dependente')" class="btn btn-defalt btn-sm" >
    	<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>Mais opções
    </button>


    <div id="dependente" style="display: none">

    <div></div>
    <div">    
		<small>Dependente</small>
		<select name="dependente" class="form-control">
	    	<option value="" disabled selected>Selecione um dependente</option>
	    	<?php
		        $dependente = new Dependente();
		        $dependente->setusuario_id($_SESSION['id']);
		        $resultado = $dependente->pesquisarByUser();
		        foreach ($resultado as $row) {
		            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
		        }                       
		    ?>
	    </select>
	    
		<small>Pagamento</small><input type="date" name="datapagamento" class="form-control">
		<small>Vencimento</small><input type="date" name="vencimento" class="form-control">

		<small>Recorrencia</small>
		<select name="recorrencia" class="form-control">
			<option value="" disabled selected>Selecione uma recorrencia</option>
			<option value="S">Semanal</option>
			<option value="M">Mensal</option>
		</select>

		<br>
		<input type="radio" name="recorrenciatipo" value=1>Recorrencia
  		<input type="radio" name="recorrenciatipo" value=2>Parcelamento
  		<br>

		<h5>Quantidade</h5><input type="number" name="parcela" class="form-control">

	</div>

    <input type="submit" name="enviar" value="Cadastrar" class="btn btn-primary pull-right" required>

	<div class="page-header"></div>
			
			<?php
				/* insere dados na entidade de produto*/
				if (isset($_POST['enviar'])) {
				    $movimento = new Movimento();
				    $movimento->setdescricao($_POST['descricao']);
					$movimento->setvalor($_POST['valor']);
					$movimento->setrecorrencia($_POST['recorrencia']);
					$movimento->setvencimento($_POST['vencimento']);
					$movimento->setdatapagamento($_POST['datapagamento']);
					$movimento->setConta_id($_POST['conta']);
					$movimento->setTipo_id($_POST['tipo']);
					$movimento->setsubCategoria_id($_POST['subcategoria']);
					$movimento->setusuario_id($_SESSION['id']);
					$movimento->setDependente_id($_POST['dependente']);
					$movimento->setparcela($_POST['parcela']);
					$movimento->setrecorrenciatipo($_POST['recorrenciatipo']);
				    echo $movimento->inserir();
				}			
			?>
	</div>
</form>

<?php require_once("template/footer.php"); ?>
<script type="text/javascript">
function dependente_show(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }
</script>