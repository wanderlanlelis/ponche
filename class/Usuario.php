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

class Usuario extends Sql {

    # mesagens de informação
    public $msgUserInativo   = "Usuario inativo, entre em contato com o administrador do sistema.";
    public $msgUserLogon     = "Usuario e/ou senha incorreto, tente novamente.";

    # dados do usuario  
    private $entidade = "tb_usuario";
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $contrasenha;
    private $perfil_id;
    private $cadastro;
    private $dataAcesso;
    private $status;

    //Set
    public function setnome($value){ $this->nome = $value; }
    public function setemail($value){ $this->email = $value;}
    public function setSenha($value){ $this->senha = $value;}
    public function setcontraSenha($value){ $this->contrasenha = $value;}

    //Get
    public function getnome(){ return $this->nome ;}
    public function getemail(){ return $this->email ;}
    public function getSenha(){ return $this->senha ;}
    public function getcontraSenha(){ return $this->contrasenha ;}

    public function pesquisar() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM ".$this->entidade);
    }
    public function entrar() {
        $sql = new Sql();
        $resultado = $sql->query("SELECT * FROM ".$this->entidade." where email = :EMAIL and senha = :SENHA;", array(
            ":EMAIL"      =>$this->getemail(),
            ":SENHA"      =>$this->getSenha()
        ));

        session_start();
        foreach ($resultado as $row) {
            $_SESSION['id']    = $row['id'];
            $_SESSION['nome']  = $row['nome'];
        }

        if ($resultado->rowCount() == 1) { 
            echo "<meta http-equiv='refresh' content='0, url=./index.php'>";
            }else return "Usuario ou senha invalido.";
    }
    public function inserir() {
        $sql = new Sql();
        $resultado = $sql->query("INSERT INTO ".$this->entidade." (nome, email, senha, perfil_id)
            VALUES (:NOME, :EMAIL, :SENHA, 3);", array(

            ":NOME"=>$this->getnome(),            
            ":EMAIL"=>$this->getemail(),
            ":SENHA"=>$this->getSenha()
        ));

        if ($resultado->rowCount() > 0) { 
            return "Cadastrado com sucesso.";
            }else return "Não foi possivel realizar o cadastro.";
    }
    public function confereSenha(){
        if ($this->getSenha() != $this->getcontraSenha() ) {
            return "As senhas informadas são diferentes, confira e digite novamente.";
        }
    }

}


