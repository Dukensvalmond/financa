<?php
session_start();
require 'config.php';

spl_autoload_register(function($class){
  
  $file = str_replace('\\','/',$class).'.php';

  if(file_exists($file)){
    require($file);
  }
});

$core = new \Core\Core();
$core->run();


