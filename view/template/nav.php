<?php
session_start();
#$id = $_SESSION['loginNome'];

?>
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">PONCHE. <small>Get financial health</small></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <!-- menus estaticos
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contrato <span class="caret"></span></a>

              <ul class="dropdown-menu">
                <li><a href="cobrancaDetalhada.php">Cobrança detalhada</a></li>
                <!--<li><a href="usuarioFormCadastro.php">Cadasrar</a></li>-->
              </ul>
            </li>

            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alocação <span class="caret"></span></a>

              <ul class="dropdown-menu">
                <li><a href="EquipamentoAlocacaoEstorno.php">Estorno</a></li>
                <li><a href="">Pesquisar alocação</a></li>
                <li><a href="eventoinserir.php">alocar evento evento</a></li>
              </ul>
            </li>



            <!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promoções <span class="caret"></span></a>

              <ul class="dropdown-menu">
                <li><a href="promocaoFormPesquisa.php">Pesquisar</a></li>
                <li><a href="promocaoFormCadastro.php">Cadasrar</a></li>
              </ul>
            </li>
            -->

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="vertical-space-m"></div> 
    <!--<div class="col-md-3 pull-right">Bem vindo(a) <?php echo $id; ?></div>-->