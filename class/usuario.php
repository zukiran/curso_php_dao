<?php

class Usuario{

    private $id;
    private $login;
    private $nome;
    private $senha;

    public function getId(){
      return $this->id;
    }
    public function setId($value){
      $this->id = $value;
    }

    public function getLogin(){
      return $this->login;
    }
    public function setLogin($value){
      $this->login = $value;
    }
    public function getNome(){
      return $this->nome;
    }
    public function setNome($value){
      $this->nome = $value;
    }
    public function getSenha(){
      return $this->senha;
    }
    public function setsenha($value){
      $this->senha = $value;
    }

public function loadById($id){

  $sql = new Sql();

  $resultado = $sql ->select("select *from a1 where id = :id", array(
    ":id" =>$id));

    if(count($resultado)> 0){

      $row = $resultado[0];
      $this->setId($row['id']);
      $this->setLogin($row['login']);
      $this->setNome($row['nome']);
      $this->setSenha($row['senha']);

    }



}


public static function getList()
{
  $sql = new Sql();
  return $sql->select("select *from a1;");
}


public static function search($login){

$sql = new Sql();
return $sql->select("select *from a1 where login like :SEARCH order by login",array(
  ':SEARCH'=>"%".$login."%"
) );
  }

  public function login($login, $senha){

    $sql = new Sql();

    $resultado = $sql ->select("select *from a1 where login = :Login and senha = :Password", array(
      ":Login" =>$login,
      ":Password"=> $senha
    ));

      if(count($resultado)> 0){

        $row = $resultado[0];
        $this->setId($row['id']);
        $this->setLogin($row['login']);
        $this->setNome($row['nome']);
        $this->setSenha($row['senha']);

      }else {
        throw new Exception("deu erro no processamento da senha ou login, gentilmente conferir os dados");

      }

  }

public function __toString(){

    return json_encode(array(
      "id"=>$this->getId(),
      "login"=>$this->getLogin(),
      "nome"=>$this->getNome(),
      "senha"=>$this->getSenha(),

    ));
}




}
?>
