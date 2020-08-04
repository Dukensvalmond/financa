<?php
namespace controllers;
use \core\Controller;
use \models\UserHelper;

class LoginController extends Controller {

    public function index(){
    
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->loadTemplate('login',[
            'flash' => $flash
        ]);

    }
    public function loginSave(){
        $viewData = [];

        $email = filter_input(INPUT_POST , 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        if($email && $senha){
            
            $token = UserHelper::verifyLogin($email,$senha);
            echo $token;
            exit;
            if($token){
                $_SESSION['token'] = $token;
                $this->loadTemplate('home',$viewData = []);
            }else{
                $_SESSION['flash'] = 'Email e/ou Senha inválido';
                $this->loadTemplate('login',$viewData = []);
                exit;
            }
        }else{
            $this->loadTemplate('login',$viewData = []);
        }
    }
}