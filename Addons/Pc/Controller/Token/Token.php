<?php

namespace Addons\Controller;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 10:16
 */
class Token
{
    use \Addons\Traits\AjaxReturn;

    public function doAccesstokenPost()
    {
        $token = model('Token')->accessToken(req('Post'));
        if(empty($token)){
            $this->AjaxReturn([
               'code'=>-200
            ]);
        }else{
            $this->AjaxReturn([
               'code'=>200,
                'msg'=>'Succeed',
                'data'=>[
                    'token'=>$token
                ]
            ]);
        }
    }


    public function doTest(){
        $a = md5('1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800');
        view('',[
            'verify'=> $a
        ]);
    }

}