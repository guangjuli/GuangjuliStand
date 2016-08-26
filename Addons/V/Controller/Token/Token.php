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
        $token = model('Token')->accessToken(req('Post'));
        if(empty($token)){
            AjaxReturn::AjaxReturn([
               'code'=>-200
            ]);
        }else{
            AjaxReturn::AjaxReturn([
               'code'=>200,
                'msg'=>'Succeed',
                'data'=>$token
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