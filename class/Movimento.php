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

class Movimento extends Sql {

    private $entidade = "tb_movimento";
    private $id;
    private $descricao;
    private $valor;
    private $recorrencia;
    private $vencimento;
    private $datapagamento;
    private $Conta_id;
    private $Tipo_id;
    private $subCategoria_id;
    private $usuario_id;
    private $Dependente_id;
    private $parcela;
    private $cadastro;
    private $status;

    function __construct() {}

    //Set
    public function setID($value){$this->id = $value; }
    public function setdescricao($value){$this->descricao = $value; }
    public function setvalor($value){$this->valor = $value; }
    public function setrecorrencia($value){
        if (empty($value)) {
            $this->recorrencia = "N";
        }else $this->recorrencia = $value; 
    }
    public function setvencimento($value){
        if (empty($value)) {
            $this->vencimento = date("Y-m-d");
        }else $this->vencimento = $value;
    }
    public function setdatapagamento($value){
        if (empty($value)) {
            $this->datapagamento = date("Y-m-d");
        }else $this->datapagamento = $value;
    }
    public function setConta_id($value){$this->Conta_id = $value; }
    public function setTipo_id($value){$this->Tipo_id = $value; }
    public function setsubCategoria_id($value){$this->subCategoria_id = $value; }
    public function setusuario_id($value){$this->usuario_id = $value; }
    public function setDependente_id($value){
        if (empty($value)) {
            $this->Dependente_id = null;
        }else $this->Dependente_id = $value;
    }
    public function setcadastro($value){$this->cadastro = $value; }
    public function setstatus($value){$this->status = $value; }
    public function setparcela($value){$this->parcela = $value; }

    //Get
    public function getID() {return $this->id;    }
    public function getdescricao(){return $this->descricao; }
    public function getvalor(){return $this->valor; }
    public function getrecorrencia(){return $this->recorrencia; }
    public function getvencimento(){return $this->vencimento; }
    public function getdatapagamento(){return $this->datapagamento; }
    public function getConta_id(){return $this->Conta_id; }
    public function getTipo_id(){return $this->Tipo_id; }
    public function getsubCategoria_id(){return $this->subCategoria_id; }
    public function getusuario_id(){return $this->usuario_id; }
    public function getDependente_id(){return $this->Dependente_id; }
    public function getcadastro(){return $this->cadastro; }
    public function getstatus(){return $this->status; }
    public function getparcela(){return $this->parcela; }

    public function inserir() {
        $sql = new Sql();
        $resultado = $sql->query("
            SET 
            @descricao      = :DESCRICAO,
            @valor          = :VALOR,
            @subcategoria   = :SUBCATEGORIA_ID,
            @usuario        = :USUARIO_ID,
            @dependente     = :DEPENDENTE_ID,
            @recorrencia    = :RECORRENCIA,
            @parcela        = :PARCELA,
            @conta          = :CONTA_ID,
            @tipo           = :TIPO_ID,
            @vencimento     = :PRAZO;
        CALL sp_movimentoInserir(
            @descricao, @valor,@subcategoria,
            @usuario,@dependente, @parcela, @conta, @tipo,
            @vencimento, @recorrencia);

            ", array(
            ":DESCRICAO"        =>$this->getdescricao(),            
            ":VALOR"            =>$this->getvalor(),
            ":SUBCATEGORIA_ID"  =>$this->getsubCategoria_id(),
            ":DEPENDENTE_ID"    =>$this->getDependente_id(),
            ":RECORRENCIA"      =>$this->getrecorrencia(),            
            #":DATAPAGAMENTO"    =>$this->getdatapagamento(),
            ":CONTA_ID"         =>$this->getConta_id(),
            ":TIPO_ID"          =>$this->getTipo_id(),
            ":PRAZO"            =>$this->getvencimento(),        
            ":USUARIO_ID"       =>$this->getusuario_id(),
            ":PARCELA"          =>$this->getparcela()
            
        ));

        if ($resultado->rowCount() > 0) { 
            return "Cadastrado com sucesso.";
            }else return "Não foi possivel realizar o cadastro.";
    }/*
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
    }*/
}
