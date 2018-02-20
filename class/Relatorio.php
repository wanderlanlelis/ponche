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
    private $categoria;
    private $usuario_id;
    private $cadastro;
    private $status;

    function __construct() {}

    //Set
    public function setID($value){$this->id = $value; }
    public function settipo($value){$this->tipo = $value; }
    public function setcategoria($value){$this->categoria = $value; }
    public function setusuario_id($value){$this->usuario_id = $value; }
    public function setcadastro($value){$this->cadastro = $value; }
    public function setstatus($value){$this->status = $value; }

    //Get
    public function getID(){return $this->id; }
    public function gettipo(){return $this->tipo; }
    public function getcategoria(){return $this->categoria; }
    public function getusuario_id(){return $this->usuario_id; }
    public function getcadastro(){return $this->cadastro; }
    public function getstatus(){return $this->status; }

    public function pesquisar() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade);
    }
    public function pesquisarByUser() {
        $sql = new Sql();
        return $sql->select("
            SELECT * FROM ".$this->entidade."
            where status = '1'
            and usuario_id = :ID
            and tipo = :TIPO;", array(
            ":ID"      =>$this->getusuario_id(),
            ":TIPO"    =>$this->gettipo()
        ));
    }
    public function ativar($value) {
        $sql = new Sql();
        $sql->query("UPDATE ".$this->entidade." SET `status` = '1' WHERE id = :ID", array(
            ":ID"   =>$value));

        return "Registro ativado com sucesso.";
    }
}
