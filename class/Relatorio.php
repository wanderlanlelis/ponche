<?php

/**
 * Controller rsponsavel pelas açoes do usuario
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

class Relatorio extends Sql {

  private $entidade = "vw_movimento";
  private $tipo;
  private $conta;
  private $categoria;
  private $usuario_id = 0;
  private $cadastro;
  private $status;

  function __construct() {}

  //Set
  public function settipo($value){$this->tipo = $value; }
  public function setconta($value){$this->conta = $value; }
  public function setsubcategoria($value){$this->categoria = $value; }
  public function setdependente($value){$this->dependente = $value; }
  public function setdescricao($value){$this->descricao = $value; }
  public function setusuario_id($value){$this->usuario_id = $value; }
  public function setcadastro($value){$this->cadastro = $value; }
  public function setstatus($value){$this->status = $value; }

  //Get
  public function gettipo(){return $this->tipo; }
  public function getconta(){return $this->conta; }
  public function getsubcategoria(){return $this->categoria; }
  public function getdependente(){return $this->dependente; }
  public function getdescricao(){return $this->descricao; }
  public function getusuario_id(){return $this->usuario_id; }
  public function getcadastro(){return $this->cadastro; }
  public function getstatus(){return $this->status; }

  public function pesquisar() {
	  $sql = new Sql();
	  return $sql->query("SELECT * FROM ".$this->entidade);
  }
	public function relatorio() {
    $sql = new Sql();
    return $sql->select("
			CALL sp_relatorio_teste(:USUARIO_ID);",
      array(
      	":USUARIO_ID" =>'31';      	
    ));
  }
 	public function teste() {
    $sql = new Sql();
    return $sql->select("
			CALL sp_relatorio_teste(".$this->getusuario_id().");",
      array(
      	
    ));
  }
  public function relatorio_old() {
      $sql = new Sql();
      return $sql->query("
          SET 
            @usuario  			= :ID,
            @tipo 					= :TIPO,
            @conta 					= :CONTA,
            @subcategoria 	= :SUBCATEGORIA,
            @dependente 		=	:DEPENDENTE, 
            @descricao 			= :DESCRICAO;              
          CALL sp_relatorio(
            @usuario,
            @tipo,
            @conta,
            @subcategoria,
            @dependente,
            @descricao);",
          array(
            ":ID"           =>$this->getusuario_id(),
            ":TIPO"         =>$this->gettipo(),
            ":CONTA"        =>$this->getconta(),
            ":SUBCATEGORIA" =>$this->getsubcategoria(),
            ":DEPENDENTE"   =>$this->getdependente(),
            ":DESCRICAO"    =>$this->getdescricao()
      ));
  }
  public function painel($value){
    $sql = new Sql();
    return $sql->select("
      SELECT * FROM vw_painel WHERE usuario_id = :ID;", array(
      ":ID" =>$value));
  }
}
