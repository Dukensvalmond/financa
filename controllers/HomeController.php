<?php
namespace controllers;
use \Core\Controller;
use \Models\UserHelper;

class HomeController extends Controller  {
    private $user;
    
    public function __construct(){
        $this->user = UserHelper::chekLogin();
      
        $viewData = [];
        if($this->user === false){
          
            $this->loadTemplate('login',$viewData);
            exit;
        }
    }

    
    public function index(){
        $viewData = [];
        $this->loadTemplate('home',$viewData=[] );

    }
}