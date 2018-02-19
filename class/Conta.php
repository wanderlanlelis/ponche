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

class Conta extends Sql {

    private $entidade = "tb_conta";
    private $id;
    private $nome;
    private $descricao;
    private $usuario_id;
    private $cadastro;
    private $status;

    function __construct() {}

    //Set
    public function setID($value){$this->id = $value; }
    public function setnome($value){$this->nome = $value; }
    public function setdescricao($value){$this->descricao = $value; }
    public function setusuario_id($value){$this->usuario_id = $value; }
    public function setcadastro($value){$this->cadastro = $value; }
    public function setstatus($value){$this->status = $value; }

    //Get
    public function getID(){return $this->id; }
    public function getnome(){return $this->nome; }
    public function getdescricao(){return $this->descricao; }
    public function getusuario_id(){return $this->usuario_id; }
    public function getcadastro(){return $this->cadastro; }
    public function getstatus(){return $this->status; }

    public function inserir() {
        $sql = new Sql();
        $resultado = $sql->query("INSERT INTO ".$this->entidade." (nome, descricao, usuario_id)
            VALUES (:NOME, :DESCRICAO, :USUARIO);", array(

            ":NOME"=>$this->getNome(),            
            ":DESCRICAO"=>$this->getdescricao(),
            ":USUARIO"=>$this->getusuario_id()
        ));

        if ($resultado->rowCount() > 0) { 
            return #"Cadastrado com sucesso.";
            "<div class='alert alert-info' role='alert'>
                Cadastrado com sucesso.
            </div>";

            }else return #"Não foi possivel realizar o cadastro.";
             "<div class='alert alert-danger' role='alert'>
                Não foi possivel realizar o cadastro.
            </div>";
    }
    public function pesquisar() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade);
    }
    public function pesquisarByUser() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade." where usuario_id = :ID and status = '1';", array(
            ":ID"      =>$this->getusuario_id()));
    }
    public function atualizar() {
        $sql = new Sql();
        $resultado = $sql->query("UPDATE ".$this->entidade." SET 
            nome = :NOME,
            descricao = :DESCRICAO

            WHERE id = :ID", array(            
            ":NOME"=>$this->getNome(),
            ":DESCRICAO"=>$this->getdescricao(),         
            ":ID"=>$this->getID()
        ));

        if ($resultado->rowCount() > 0) { 
            return "Registro atualizado com sucesso.";
            }else return "Não foi possivel atualizar.";
    }
    public function desativar($value) {
        $sql = new Sql();
        $sql->query("UPDATE ".$this->entidade." SET `status` = '0' WHERE id = :ID", array(
            ":ID"   =>$value));

        return "Removido com sucesso.";
    }
    public function ativar($value) {
        $sql = new Sql();
        $sql->query("UPDATE ".$this->entidade." SET `status` = '1' WHERE id = :ID", array(
            ":ID"   =>$value));

        return "Ativado com sucesso.";
    }
}
