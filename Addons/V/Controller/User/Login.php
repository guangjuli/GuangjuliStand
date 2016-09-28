<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-23
 * Time: 10:24
 */

namespace Addons\Controller;


class User
{
    use \Addons\Traits\AjaxReturn;

    //用户登录
    public function doLoginPost()
    {
        $req = saddslashes(req('Post'));
        $user = model('User')->getUserByLogin($req['login']);
        if(empty($user)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'该用户不存在',
            ]);
        }else{
            if($user['password']!=$req['password']){
                $this->AjaxReturn([
                    'code'=>-201,
                    'msg'=>'密码错误',
                ]);
            }
            $token = model('Token')->accessToken(req('Post'));
            if(empty($token)){
                $this->AjaxReturn([
                    'code'=>-202,
                    'msg'=>'没有权限',
                ]);
            }
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>[
                    'token'=>$token
                ]
            ]);
        }
    }
}