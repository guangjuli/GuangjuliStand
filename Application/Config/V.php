<?php

return [
    //依据数据库user_group映射配置用户组,当表更改的时候请更新此配置
    'userGroup'=>[
        'system'=>1,      //系统管理员1
        'system2'=>2,     //系统管理员2
        'organization'=>11,  //组织
        'department'=>10,    //科室
        'doctor'=>12,        //医生
        'android'=>20,      //安卓用户
        'ios'=>21,           //ios用户
        'casualUser'=>22    //临时用户
    ],
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
];
