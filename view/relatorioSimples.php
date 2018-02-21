<?php
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>	

<div class="col-md-8 col-md-offset-2" >
	<div class="page-header"><br>
    	<h3>Relatorio <small>estatico</small></h3>
    </div>
	<div class="alert alert-silver alert-dismissible" role="alert">
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  		<span aria-hidden="true">&times;</span>
	  	</button> 	
	  	<strong>Informação!</strong>
	  	<p>Você pode filtrar selecionando os campos abaixo.</p>
	</div>

	<form method="POST">
		<select name="conta" class="form-control">
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
	    <select name="tipo" class="form-control">
	    	<option value="" disabled selected>Selecione o tipo</option>
	    	<?php
		        $tipo = new Tipo();
		        $resultado = $tipo->pesquisar();
		        foreach ($resultado as $row) {
		            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
		        }                       
		    ?>
	    </select>
	    <select name="categoria" class="form-control">
	    	<option value="" disabled selected>Selecione uma categoria</option>
	    	<?php
		        $categoria = new Categoria();
		        $resultado = $categoria->pesquisar();
		        foreach ($resultado as $row) {
		            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
		        }                       
		    ?>
	    </select>
	    <select name="subcategoria" class="form-control">
	    	<option value="" disabled selected>Selecione uma subcategoria</option>
	    	<?php
		        $subcategoria = new Subcategoria();
		        $resultado = $subcategoria->pesquisar();
		        foreach ($resultado as $row) {
		            echo "<option value=' ".$row['id']."'>".$row['nome']."</option>";
		        }                       
		    ?>
	    </select>
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
	    <input type="text" class="form-control" name="descricao" placeholder="Descricao">
		<input type="submit" name="enviar" value="Pesquisar" class="btn btn-primary form-control">
	</form>
			
	<?php
	if (isset($_POST['enviar'])) {
        $relatorio = new Relatorio();
        $relatorio->setusuario_id($_SESSION['id']);
        $relatorio->settipo($_POST['tipo']);
        $resultado = $relatorio->pesquisarByUser();

        if ($resultado) {
			echo "
        	<div class='panel panel-default'>			  
			<div class='panel-heading'>Resultado</div>
			<div class='col-md'>
	        		<table class='table'>
						<tr>
							<th>Tipo</th>
							<th>Conta</th>
							<th>Categoria</th>
							<th>Subcategoria</th>
						</tr>";
	        foreach ($resultado as $row) {
	        	echo "	        		
					<tr>
						<td>".$row['tipo']."</td>
						<td>".$row['conta']."</td>
						<td>".$row['categoria']."</td>
						<td>".$row['subcategoria']."</td>						
					</tr>";
	        } 
        }else echo "
				<div class='alert alert-danger' role='alert'>
					<p>Nenhum registro encontrado!</p>
				</div>";
	}      
    ?>
</div>
<?php require_once("template/footer.php"); ?>

