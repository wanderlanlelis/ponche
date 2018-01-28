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

class Cliente extends Sql {

    private $entidade = "cliente";
    private $id;
    private $nome;
    private $sobrenome;
    private $cpf;    

    private $cnpj;
    private $nomefantasia;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;

    private $telefone;
    private $celular;
    private $email;
    private $status;

    function __construct() {
        # code...
    }

    //Set
    public function setID($value){$this->id = $value; }
    public function setCpf($value){$this->cpf = $value; }
    public function setNome($value){$this->nome = $value; }
    public function setSobrenome($value){$this->sobrenome = $value; }
    public function setstatus($value){$this->idade = $value; }
    public function setcnpj($value){$this->cnpj = $value; }   
    public function setnomefantasia($value){$this->nomefantasia = $value; }   
    public function setendereco($value){$this->endereco = $value; }   
    public function setbairro($value){$this->bairro = $value; }   
    public function setcidade($value){$this->cidade = $value; }   
    public function setuf($value){$this->uf = $value; }   
    public function settelefone($value){$this->telefone = $value; }   
    public function setcelular($value){$this->celular = $value; }   
    public function setemail($value){$this->email = $value; }


    //Get
    public function getID() {return $this->id;    }
    public function getCpf() {return $this->cpf;    }
    public function getNome() {return $this->nome;    }
    public function getSobrenome() {return $this->sobrenome;    }
    public function getstatus() {return $this->status;    }
    public function getcnpj(){return $this->cnpj; }   
    public function getnomefantasia(){return $this->nomefantasia; }   
    public function getendereco(){return $this->endereco; }   
    public function getbairro(){return $this->bairro; }   
    public function getcidade(){return $this->cidade; }   
    public function getuf(){return $this->uf; }
    public function gettelefone(){return $this->telefone; }   
    public function getcelular(){return $this->celular; }   
    public function getemail(){return $this->email; } 

    public function inserir() {
        $sql = new Sql();
        $resultado = $sql->query("INSERT INTO ".$this->entidade." (nome, sobrenome, cpf, nomefantasia, cnpj, endereco, bairro, cidade, uf, telefone, celular, email) 
            VALUES (:NOME, :SOBRENOME, :CPF, :NOMEFANTASIA, :CNPJ, :ENDERECO, :BAIRRO, :CIDADE, :UF, :TELEFONE, :CELULAR, :EMAIL);", array(

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
            ":EMAIL"=>$this->getemail()
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
