<?php 

require_once("config.php");


/*
$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM $tabela
 ");
echo json_encode($usuarios);
*/


/* carrega somente um usuario
$usuario = new Usuario();
$usuario->loadById(7);
echo $usuario;
*/

/* carrega todos os usuarios da tabela
$usuario = Usuario::loadList();
echo json_encode($usuario);
*/

/*carrega todos os dados de acordo com parte do nome digitado
$usuario = Usuario::search("jo"); 
echo json_encode($usuario);
*/


/* verifica na tabela login se o usuario e senha existe
$usuario = new Usuario();
$usuario->login("joao", "222333");
echo $usuario;
*/

/* insere dados na tambela de usuarios*/
$usuario = new Usuario();
$usuario->inserir("Wanderlan Lelis","wanderlanlelis@gmail.com","wanderlan","8888888","8888888",1,1);



/*atualiza registro no banco pelo ID
$usuario = new Usuario();
$usuario->loadById(12);
$usuario->atualizar("wanderlan.lelis","007");
*/

/* deleta usuario na tabela de usuarios
$usuario = Usuario::deletar(9);
*/
 ?>