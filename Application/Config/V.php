<?php

return [
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
