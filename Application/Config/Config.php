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

    /*nsc添加*/
    'token'=>[
        'clientSecret'=>'1cda067b175ab0e9e1fdfe8dcd7d71ff',
        'expires'     =>7200
    ],

    'uploadHeadImage'=>[
        'sizeLimit'=>10485760,      //1024.1024 = 1MB
        'fileExtName'=>['gif','jpg','png'],
        'savePath'=>'./headImage/'
    ],

    'uploadEcg'=>[
        'sizeLimit'=>10485760,      //1024.1024 = 1MB
        'fileExtName'=>['txt'],
        'savePath'=>'./ecg/'
    ],

    //短信
    'SMS'=>[
        'apikey'=>'243e709fb7aa82842eb0498bc24518e2',
        'register'=>[
            'messageContent'=>'【糖专家】您正在使用viga进行短信注册，验证码为：',
            'curlopt_url'=>'https://api.dingdongcloud.com/v1/sms/sendyzm'                //表示验证码接口
        ],
        'findPassword'=>[
            'messageContent'=>'【糖专家】您正在使用viga进行更改密码，验证码为：',
            'curlopt_url'=>'https://api.dingdongcloud.com/v1/sms/sendyzm'                //表示验证码接口
        ]
    ],

    //不用校验Token的方法
    'api_needlessCheckTokenMethod'=>[
        'V'=>[
            'Index',
            'Accesstoken',
            'Register',
            'Findpassword',
            'Registerauthcode',
            'Findpsdauthcode',
        ],
    ],

];


