<?php
include("../vendor/autoload.php");

define('APPROOT', '../App/');

//错误提示
$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);




$res = server('db')->getall("select * from user");
D($res);
exit;

