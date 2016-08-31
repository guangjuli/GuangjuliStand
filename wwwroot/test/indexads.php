<?php
include("../vendor/autoload.php");

//错误提示
$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);
//
////ads调用
//Addons\Ads::Run();              //地址栏路由
//Addons\Ads::Go("/demo/home/index");              //地址栏路由
//
////封装
////帮助
//ads('demo')->help();
////安装
//ads('demo')->install();
////卸载
//ads('demo')->uninstall();
////返回depend
//ads('demo')->depend();
////返回被depend
//ads('demo')->bedepend();
////返回依赖的表
//ads('demo')->dependtable();
////返回可以调用的API
//ads('demo')->api();
////返回菜单
//ads('demo')->menu();
////返回图标
//ads('demo')->icon();
////返回信息 模块名介绍等等
//ads('demo')->info();
//
//ads('demo')->ad('home/index',$params);
////or
//ads('demo')->params($params)->ad('home/index');
//


//路由设计

//1 :
//根据获取到的数据,比对数据库,访问相对应的ads
//http://gst.so/?demo/home/index&mst=123
//2
//Addons\Ads::Run("/demo/home/index");              //地址栏路由


/**
 * 光巨力Stand
 */
if(Application\Model::getInstance()->make('routerAdd')->isAddons()){
    define('APPROOT', '../Addons/'.(\Application\Model::getInstance()->make('routerAdd')->getModulechr()).'/');
    Addons\Bootstrap::Run();
}else{
    define('APPROOT', '../App/');
    App\Bootstrap::Run();
}





