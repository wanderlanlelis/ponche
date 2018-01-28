<?php

/**
 * Controller rsponsavel pelas interacoes
 * com o sgdb usando conceito DAO.
 *
 * PHP version 7
 *
 * @category Sistema
 * @package  controller
 * @author   Wanderlan Lelis
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://www.wanderlanlelis.com.br/
 *
 */

require_once("..".DIRECTORY_SEPARATOR."config.php");

class Sql extends PDO
{
	private $conn;
	
	public function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost; dbname=mydb_ponche", "root", ""); // para usar com mysql
	}
	private function setParams($statments, $parametros = array())
	{		
		foreach ($parametros as $key => $value) {			
			$this->setParam($statments, $key, $value);
		}
	}
	public function setParam($statments, $key, $value)
	{
		$statments->bindParam($key, $value);
	}

	public function query($rawQuery, $parametros = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt,$parametros);
		$stmt->execute();

		return $stmt; 
	}
	public function select($rawQuery, $parametros = array()):array
	{
		$stmt = $this->query($rawQuery, $parametros);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

 ?>