<?php
include("../vendor/autoload.php");


//错误提示
$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);


if(\Application\Model::getInstance()->make('routerAdd')->isAddons()){
    define('APPROOT', '../Addons/'.(\Application\Model::getInstance()->make('routerAdd')->getModulechr()).'/');
    Addons\Bootstrap::run();
}else{
    define('APPROOT', '../App/');
    App\Bootstrap::run();

}



