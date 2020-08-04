<?php 
require 'environment.php';

$config = [];
if( ENVIRONMENT == 'development'){
    define("BASE","http://localhost/financa/");
    $config['dbname'] = 'financa';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}elseif( ENVIRONMENT == 'production'){
    define("BASE",'www.lkhttp//localhost/gf');
    $config['dbname'] = 'financa';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
}catch(PDOExeption $e){
    echo 'ERRO'.$e->getMessage();
    exit;
}
