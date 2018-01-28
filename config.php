<?php

function inserirClasse($class_name){
	$filename = "..".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR.$class_name. ".php";
	if(file_exists($filename)){
		require_once($filename);
	}else echo "Arquivo não existe no diretorio.";
}
function inserirClasse2($class_name){
	$filename = "class".DIRECTORY_SEPARATOR.$class_name. ".php";
	if(file_exists($filename)){
		require_once($filename);
	}else echo "Arquivo não existe no diretorio.";
}

spl_autoload_register("inserirClasse");
spl_autoload_register("inserirClasse2");

?>
