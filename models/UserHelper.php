<?php
namespace models;
use \core\Model;
use \User;


class UserHelper extends Model {
    
    public static function chekLogin(){
        $user = [];
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $sql = "SELECT * FROM user WHERE token = :token";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":token",$token);
            $sql->execute();
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $user = new User();
                $user->setId($sql['id']);
                $user->setNome($sql['nome']);
                $user->setEmail($sql['email']);
                $user->setSenha($sql['senha']);
                return $user;
                exit;
            }
        }
        return false;
    }

    public static function verifyLogin($email,$senha){
        $dado = [];
        $sql = "SELECT token FROM user WHERE email = :email AND senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email",$email);
        $sql->bindValue(":senha",$senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dado = $sql->fetch(); 
        }
        return $dado;
    }

    public static function addUser($nome, $email, $senha){
        $sql = "INSERT INTO user SET nome = :nome, email = :email, senha = :senha ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome",$nome);
        $sql->bindValue(":email",$email);
        $sql->bindValue(":senha",$senha);
        $sql->execute();
    }

  
   
}
