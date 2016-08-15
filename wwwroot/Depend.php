<?php

/**
 * document对象,指定一个目录 就可以按照约定生成文档发布
 */

include("../vendor/autoload.php");
define('APPROOT', '../App/');

$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);


/**
 * 文档系统测试
 */

$document = \Application\Application::getInstance()->make('Document');
$document->depend();