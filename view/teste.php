<?php
require_once("..".DIRECTORY_SEPARATOR."config.php");
#error_reporting(0);
session_start();
?>	

<?php


	$subcategoria = new Subcategoria();
	$subcategoria->setusuario_id($_SESSION['id']);
	$subcategoria->setcategoria(1);
	$subcategoria->setnome('teste');
	echo $subcategoria->inserir();                     
?>