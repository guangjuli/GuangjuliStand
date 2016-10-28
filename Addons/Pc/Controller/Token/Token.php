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
        file_get_contents('php://input', 'r');
        $req = json_decode(req('Post'));
        $token = model('Token')->accessToken($req);
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