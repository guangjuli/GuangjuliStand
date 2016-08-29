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
            $check = model('User')->updateUserByUserId(req('Post'));
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
    //获取用户信息
    public function doUserinfoPost()
    {
        $userInfo=model('User')->getUserInfoByToken();
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
        $code = model('Password')->resetPasswordValidateReq(req('Post'));
        $msg = model('Password')->returnNews();
        if($code==200){
             $code = model('Password')->resetPassword(req('Post')['password'])?200:-200;
        }
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg[$code],
        ]);
    }
}