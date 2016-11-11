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
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $token = model('Token')->accessToken($req);
        if(empty($token)){
            $this->AjaxReturn([
                'code'=>-202,
                'msg'=>'没有权限',
            ]);
        }
        if(empty(bus('token')['userId'])){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'该用户不存在',
            ]);
        }
        if(bus('token')['password']!=$req['password']){
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