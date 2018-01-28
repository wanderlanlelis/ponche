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

require_once(".".DIRECTORY_SEPARATOR."config.php");

class MovimentoDetalhe extends Sql {

    private $entidade = "tb_movimento_detalhe";
    private $id;
    private $movimento_id;
    private $valor;
    private $realizado;
    private $cadastro;
    private $status;


    function __construct() {}

    //Set
    public function setID($value){$this->id = $value; }
    public function setmovimento_id($value){$this->movimento_id = $value; }
    public function setvalor($value){$this->valor = $value; }
    public function setrealizado($value){$this->realizado = $value; }

    //Get
    public function getID() {return $this->id;    }
    public function getmovimento_id(){return $this->movimento_id; }
    public function getvalor(){return $this->valor; }
    public function getrealizado(){return $this->realizado; }

    public function inserir() {
        $sql = new Sql();
        $resultado = $sql->query("INSERT INTO ".$this->entidade." (movimento_id, valor, realizado)
            VALUES (:MOVIMENTO, :VALOR, :REALIZADO);", array(

            ":MOVIMENTO"=>$this->getmovimento_id(),            
            ":VALOR"=>$this->getvalor(),
            ":REALIZADO"=>$this->getrealizado()
        ));

        if ($resultado->rowCount() > 0) { 
            return "Cadastrado com sucesso.";
            }else return "Não foi possivel realizar o cadastro.";
    }
    public function pesquisar() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade);
    }
    public function pesquisarCPF() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade." WHERE CPf = :CPF;", array(
            ":CPF"      =>$this->getCpf()));
    }
    public function pesquisarID() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade." WHERE id = :ID;", array(
            ":ID"      =>$this->getID()));
    }
    public function atualizar() {

        $sql = new Sql();
        $resultado = $sql->query("UPDATE ".$this->entidade." SET 
            nome = :NOME,
            sobrenome = :SOBRENOME,
            cpf = :CPF,
            nomefantasia = :NOMEFANTASIA,
            cnpj = :CNPJ,
            endereco = :ENDERECO,
            bairro = :BAIRRO,
            cidade = :CIDADE,
            uf = :UF,
            telefone = :TELEFONE,
            celular = :CELULAR,
            email = :EMAIL

            WHERE id = :ID", array(            
            ":NOME"=>$this->getNome(),            
            ":SOBRENOME"=>$this->getSobrenome(),
            ":CPF"=>$this->getCpf(),
            ":NOMEFANTASIA"=>$this->getnomefantasia(),
            ":CNPJ" =>$this->getcnpj(),
            ":ENDERECO"=>$this->getendereco(),
            ":BAIRRO"=>$this->getbairro(),
            ":CIDADE"=>$this->getcidade(),
            ":UF"=>$this->getuf(),
            ":TELEFONE"=>$this->gettelefone(),
            ":CELULAR"=>$this->getcelular(),
            ":EMAIL"=>$this->getemail(),
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
