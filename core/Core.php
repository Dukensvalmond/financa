<?php 
namespace core;
class Core {

    public function run() {
        
        $url = '/';

        if(isset($_GET['url'])){
            $url .= $_GET['url'];
        }

        $params = [];

        if( !empty($url) && $url != '/'){
            $url = explode('/',$url);
            array_shift($url);
            $currentController = $url[0].'Controller';
            
            array_shift($url);
            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);

            }else{
                $currentAction = 'index';
            }

            if(count($url) > 0){
                $params = $url;
            }

        }else{
            $currentController = 'HomeController';
            $currentAction = 'index';
        }

        $currentController = ucfirst($currentController);
        $prefixo = '\Controllers\\';
       
        if(!file_exists('Controllers/'.$currentController.'.php') || 
        !method_exists($prefixo.$currentController, $currentAction)){
            $currentController ='NotFoundController';
            $currentAction = 'index';
        }

        $Controller = $prefixo.$currentController;
        $c = new $Controller();
        call_user_func_array(array($c, $currentAction), $params);
    }
   


}