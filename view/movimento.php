<?php
require_once("template/header.php");
require_once("template/nav.php");
require_once("..".DIRECTORY_SEPARATOR."config.php");
?>	

<div class="container">
  	<div class="row justify-content-md-center">
		<div class="col-md-10 col-md-offset-1" >
			<div class="page-header"><br>
		   		<h3>Configurar <small>lançamento</small></h3>
		  	</div>
			<div class="alert alert-silver alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  		<span aria-hidden="true">&times;</span>
			  	</button> 	
			  	<strong>Informação!</strong><p>Você pode fazer um cadastro clicando no botão abaixo.</p>
			</div>

			<p><button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#myModal">
				Cadastrar
			</button></p>


			<!-- aparecer no desktop
            <div class="mobile-hide"><h1 id="logo"><a href="#">Recarga de Toner e Cartuchos, Manutenção de Impressoras</a></h1></div>
      		<!- aparecer no mobile  
            <div class="mobile"><div class="desktop-hide"><h1 class="logomobile"><a href="#">Recarga de Toner e Cartuchos, Manutenção de Impressoras</a></h1></div></div>
			--> 
			
			<?php #<!-- List group -->
		        $movimento = new Movimento();
		        $movimento->setusuario_id($_SESSION['id']);
		        $resultado = $movimento->pesquisarByUser();

		        if ($resultado) {
					echo "
		        	<div class='panel panel-default'>			  
						<div class='panel-heading'>Ultimos lançamentos</div>
							<div class='table-responsive-md'>
				        		<table class='table table-sm'>
				        			<thead class='mobile-hide'>
										<tr>
											<th>Tipo</th>
											<th>Subcategoria</th>
											<th>Descrição</th>
											<th>Valor</th>
											<th></th>
										</tr>
									<thead>

									<thead class='desktop-hide'>
										<tr>
											<th>Descrição</th>
											<th>Valor</th>
											<th></th>
										</tr>
									<thead>";
			        foreach ($resultado as $row) {
			        	echo "
			        		<tbody class='mobile-hide'>	        		
								<tr>
									<td>".$row['tipo']."</td>
									<td>".$row['subcategoria']."</td>
									<td>".$row['descricao']."</td>
									<td>R$ ".$row['valorunidade']."</td>
									<td>
										<a href='?a=del&id=".$row['id']." '' class='float-right'>
			        						<button class='btn btn-dark btn-sm pull-right'>+</button>
			        					</a>
			        				</td>
								</tr>
							</tbody>

							<tbody class='desktop-hide'>	        		
								<tr>
									<td>".$row['descricao']."</td>
									<td>R$ ".$row['valorunidade']."</td>
									<td>
										<a href='?a=del&id=".$row['id']." '' class='float-right'>
			        						<button class='btn btn-dark btn-sm pull-right'>+</button>
			        					</a>
			        				</td>
								</tr>
							</tbody>";
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
        <h4 class="modal-title">Cadastro <small>de movimentação</small></h4>
    	</div>

    	<div class="modal-body">
			<div class="well" role="alert">
				<p>Preencha o(s) campo(s) abaixo para cadastrar.</p>
			</div>
			<form method="POST">
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
			    <div>    
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

<script type="text/javascript">
function dependente_show(el) {
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}
</script>

<?php
if (isset($_GET['a']) ) {
    $movimento = new Movimento();
    $movimento->desativar($_GET['id']);
    echo "<meta http-equiv='refresh' content='0, url=?'>";
}			
?>


