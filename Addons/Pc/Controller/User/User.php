<?php

namespace Addons\Controller;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-18
 * Time: 11:59
 */
class User
{

    use \Addons\Traits\AjaxReturn;

    //用户登录
    public function doLoginPost()
    {
        $req = saddslashes(req('Post'));
        $token = model('Token')->accessToken($req);
        if(empty($token)){
            $this->AjaxReturn([
                'code'=>-202,
                'msg'=>'没有权限',
            ]);
        }
        $user = model('User')->getDoctorByLogin($req['login'],$req['type']);
        if(empty($user)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'该用户不存在',
            ]);
        }
        if($user['password']!=$req['password']){
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>'密码错误',
            ]);
        }
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'succeed',
            'data'=>$token
        ]);

    }


    public function doTest(){
        view('',[
            'verify'=>md5('1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800'),
        ]);
    }
}