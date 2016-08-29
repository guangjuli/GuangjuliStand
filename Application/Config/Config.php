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
        'ErrorPage404'    => 'Error/Error404.tpl',
        'ErrorPage500'    => 'Error/Error500.tpl',
        'ErrorPageMsg'    => 'Error/ErrorMsg.tpl',
        'MessagePageView' => 'Error/ErrorView.tpl',
    ],
    /**
     * Application::data
     */
    'Data' => __DIR__.'/../../Cache/Data/',
];


