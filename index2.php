<?php 
require_once('config.php');

$usuario = new Usuario;
$usuario.>setnome('joao');
$usuario.>setemail('joao@teste.com.br');
$usuario.>setSenha('123456');
echo $usuario->inserir();

?>