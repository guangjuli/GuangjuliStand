<?php
include("../vendor/autoload.php");

define('APPROOT', '../App/');

//错误提示
$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);

$widget = 
D($widget);

//if(Model('Gate')->isAddons()){
//    Addons\Bootstrap::Run();
//}else{
//    App\Bootstrap::Run();
//}
//



