<?php
	require_once("..".DIRECTORY_SEPARATOR."config.php");
    $conta = new Conta();
    $conta->getusuario_id(3);
    $resultado = $conta->pesquisarByUser();
    foreach ($resultado as $row) {
        echo $row['id'].">".$row['nome'];
    }                       
?>