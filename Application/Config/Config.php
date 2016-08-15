<?php
/*
 * 全局基础配置
 * \Application\Server::Config();
*/

return [
    /*
    |--------------------------------------------------------------------------
    | 调试开关
    |--------------------------------------------------------------------------
    | error_reporting(E_ERROR | E_WARNING | E_PARSE);
    | error_reporting(E_ALL | E_PARSE);
    | E_ALL ^ E_PARSE,
    */
    'viewpath'              => APPROOT.'../App/Views/',
    /*
    |--------------------------------------------------------------------------
    | 执行环境参数
    |--------------------------------------------------------------------------
    | D(dc());
    */
    'Env' => [
        'WDS'               => DIRECTORY_SEPARATOR,
        'charset'           => 'utf-8',         //编码说明
    ],

    /*
    |--------------------------------------------------------------------------
    | App相关定义
    |--------------------------------------------------------------------------
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    */
    'App' => [
        'ErrorPage404'    => 'Error/Error404.php',
        'ErrorPage500'    => 'Error/Error500.php',
        'ErrorPageMsg'    => 'Error/ErrorMsg.php',
        'MessagePageView' => 'Error/ErrorView.php',
    ],
    /**
     * Application::data
     */
    'Data' => APPROOT.'../Cache/Data/',

    /**
     * addons 列表 注册
     */
    'Addons'=>[
        'Welcome',         //默认
        'mrt',
    ]
];

