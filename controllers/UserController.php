<?php
namespace controllers;
use \core\Controller;
use \models\UserHelper;

class UserController extends Controller {

    public function index(){

    }

    public function cadastraUser(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->loadTemplate('cadastro_user',[
            'flash' => $flash
        ]);
    }
    public function save(){
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        
        if($nome && $email && $senha){
            
            UserHelper::addUser($nome, $email, $senha);
            $this->loadTemplate('home'); 
            exit;
        }else{
            $_SESSION['flash'] = 'Preencha todos os campos';
            $this->loadTemplate('cadastro_user'); 
        }
      
    }
}