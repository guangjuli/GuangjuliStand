<?php

namespace Addons\Controller;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-18
 * Time: 11:59
 */
class User extends BaseController
{

    use \Addons\Traits\AjaxReturn;

    public function __construct()
    {
        parent::__construct();
    }
    public function doUserinfosubmitPost()
    {
        $msg = model('User')->paramsConfig()['returnNews'];
        $code = model('User')->validateUserReq(req('Post'));
        if($code==200){
            $check = model('Userinfo')->submitUserInfo(req('Post'));
            if($check){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg' => $msg[$code],
                ]);
            }else{
                $this->AjaxReturn([
                    'code' => -200,
                    'msg' => $msg[-200],
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg[$code],
            ]);
        }
    }
    //获取用户信息,操作的是user_info表
    public function doUserinfoPost()
    {
        $userInfo=model('Userinfo')->getUsrInfoDetailByUserId();
        if(!empty($userInfo)){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'Succeed',
                'data'=>$userInfo
            ]);
        }else{
            $this->AjaxReturn([
                'code' => -200,
            ]);
        }
    }
    //上传用户头像
    public function doUpuserimagePost()
    {
        $file = $_FILES['tfile'];
        $msg = model('Upload')->returnMsg();
        $code = model('User')->uploadHeadImage($file);
        if($code==200){
            $code = model('User')->saveImagePathToDb()?200:-200;
        }
        $this->AjaxReturn([
            'code'=>$code,
            'msg'=>$msg[$code],
        ]);
    }

    //知道原密码重置密码
    public function doResetpasswordPost()
    {
        $req = req('Post');
        $code = model('Password')->resetPassword($req['old_password'],$req['password'])?200:-200;
        $this->AjaxReturn([
            'code'=>$code,
        ]);
    }

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