<?php

namespace Addons\Controller;

use Addons\Model\AjaxReturn;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 10:16
 */
class Token
{


    public function doAccesstokenPost()
    {
        $req = req('Post');
        if(model('token')->validateTokenReq($req)){
            $token = model('Token')->accessToken(req('Post'));
            if (empty($token)) {
                AjaxReturn::AjaxReturn([
                    'code' => -200,
                    'msg' => '获取失败'
                ]);
            } else {
                AjaxReturn::AjaxReturn([
                    'code' =>200,
                    'msg' =>'Succeed',
                    'data' => $token
                ]);
            }
        }else{
            AjaxReturn::AjaxReturn([
                'code' => -201,
                'msg' => '没有权限',
            ]);
        }
    }

    public function doIndex()
    {
        view('',[
                'verify'=>md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800')
        ]
        );
    }

}