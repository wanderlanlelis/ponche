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

class Subcategoria extends Sql {

    private $entidade = "tb_subcategoria";
    private $id;
    private $nome;
    private $categoria;
    private $usuario_id;
    private $cadastro;
    private $status;

    function __construct() {}

    //Set
    public function setID($value){$this->id = $value; }
    public function setnome($value){$this->nome = $value; }
    public function setcategoria($value){$this->categoria = $value; }
    public function setusuario_id($value){$this->usuario_id = $value; }
    public function setcadastro($value){$this->cadastro = $value; }
    public function setstatus($value){$this->status = $value; }

    //Get
    public function getID(){return $this->id; }
    public function getnome(){return $this->nome; }
    public function getcategoria(){return $this->categoria; }
    public function getusuario_id(){return $this->usuario_id; }
    public function getcadastro(){return $this->cadastro; }
    public function getstatus(){return $this->status; }

    public function inserir() {
        $sql = new Sql();
        $resultado = $sql->query("INSERT INTO ".$this->entidade." (nome, categoria_id, usuario_id)
            VALUES (:NOME, :CATEGORIA, :USUARIO);", array(

            ":NOME"=>$this->getNome(),            
            ":CATEGORIA"=>$this->getcategoria(),
            ":USUARIO"=>$this->getusuario_id()
        ));

        if ($resultado->rowCount() > 0) { 
            return "Cadastrado com sucesso.";
            }else return "Não foi possivel realizar o cadastro.";
    }
    public function pesquisar() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade);
    }
    public function pesquisarByUser() {
        $sql = new Sql();
        return $sql->select("
            SELECT s.id, s.nome as subcategoria, c.nome FROM ".$this->entidade." as s
            inner join tb_categoria as c on c.id = s.categoria_id
            where s.status = '1'
            and s.usuario_id = :ID;", array(
            ":ID"      =>$this->getusuario_id()));
    }
    public function atualizar() {

        $sql = new Sql();
        $resultado = $sql->query("UPDATE ".$this->entidade." SET 
            nome = :NOME,
            sobrenome = :SOBRENOME,
            cpf = :CPF

            WHERE id = :ID", array(            
            ":NOME"=>$this->getNome(),            
            ":SOBRENOME"=>$this->getSobrenome(),
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

        return "Registro removido com sucesso.";
    }
    public function ativar($value) {
        $sql = new Sql();
        $sql->query("UPDATE ".$this->entidade." SET `status` = '1' WHERE id = :ID", array(
            ":ID"   =>$value));

        return "Registro ativado com sucesso.";
    }
}
