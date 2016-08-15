<?php
include("../vendor/autoload.php");

define('APPROOT', '../App/');

//错误提示
$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);



server()->help();
exit;

//if(Model('Gate')->isAddons()){
//    Addons\Bootstrap::Run();
//}else{
//    App\Bootstrap::Run();
//}
//



