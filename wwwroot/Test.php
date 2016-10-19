<?php
include("../vendor/autoload.php");

//错误提示
$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);
/**
 * 光巨力Stand
 */
if(Application\Model::getInstance()->make('routerAdd')->isAddons()){
    define('APPROOT', '../Addons/'.(\Application\Model::getInstance()->make('routerAdd')->getModulechr()).'/');
  //  Addons\Bootstrap::Run();
}else{
    define('APPROOT', '../App/');
  //  App\Bootstrap::Run();
}



$cache = server('cache');
//$cache->set('key', 'myKeyValue2', 13);



echo $cache->get('key');
//
//echo fc('USERALLOWREGISTER');
//
//print_r(fc('asdfasdfsadf'));
//echo fc('afsd');
//echo fc('afsd');
//echo fc('afsd');
//echo fc('afsd');
//echo fc('afsd');
//
//echo 123;