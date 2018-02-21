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
    private $id;
    private $tipo;
    private $conta;
    private $categoria;
    private $usuario_id;
    private $cadastro;
    private $status;

    function __construct() {}

    //Set
    public function setID($value){$this->id = $value; }
    public function settipo($value){$this->tipo = $value; }
    public function setconta($value){$this->conta = $value; }
    public function setsubcategoria($value){$this->categoria = $value; }
    public function setdependente($value){$this->dependente = $value; }
    public function setdescricao($value){$this->descricao = $value; }
    public function setusuario_id($value){$this->usuario_id = $value; }
    public function setcadastro($value){$this->cadastro = $value; }
    public function setstatus($value){$this->status = $value; }

    //Get
    public function getID(){return $this->id; }
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
        return $sql->select("SELECT * FROM ".$this->entidade);
    }
    public function pesquisarByUser() {
        $sql = new Sql();
        return $sql->query("
            SET @usuario        = :ID;
            SET @tipo           = :TIPO;
            SET @conta          = :CONTA;
            SET @subcategoria   = SUBCATEGORIA;
            SET @dependente     = DEPENDENTE;
            SET @descricao      = '% :DESCRICAO %';
            CALL sp_relatorio(
            @usuario, @tipo, @conta, @subcategoria, @dependente, @descricao);", 
            array(
            ":ID"           =>$this->getusuario_id(),
            ":TIPO"         =>$this->gettipo(),
            ":CONTA"        =>$this->getconta(),
            ":SUBCATEGORIA" =>$this->getsubcategoria(),
            ":DEPENDENTE"   =>$this->getdependente(),
            ":DESCRICAO"    =>$this->getdescricao()
        ));
    }
    public function ativar($value) {
        $sql = new Sql();
        $sql->query("UPDATE ".$this->entidade." SET `status` = '1' WHERE id = :ID", array(
            ":ID"   =>$value));

        return "Registro ativado com sucesso.";
    }
}
