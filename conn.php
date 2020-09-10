<?php



   class Conexao{

     private = $dsn;
     private = $user;
     private = $senha;

     public function getDsn(){
     	return $this->dsn;
     }
   public function setDsn($d){
   	$this->dsn = $d;
   }

public function getUser(){
     	return $this->user;
     }
   public function setDsn($u){
   	$this->user = $u
   }

public function getSenha(){
     	return $this->senha;
     }
   public function setSenha($senha){
   	$this->senha = $senha;
   }

 public function getConexao(){
  $pdo = new pdo($this->dsn, $this->user, $this->senha);
  return $pdo;


 }

   }


   $conexao = NEW conexao();
   $conexao->setDsn('MYSQL: host=localhost; dbname=nomebanco');
   $conexao->setUser('root'); // usuario do banco
   $conexao->setSenha('12345678');// senha do banco
   $conn = $conexao->getConexao();
   