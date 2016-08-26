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
    //注册
    public function doRegisterPost()
    {
        $code = model('Register')->validateRegisterReq(req('Post'));
        $msg  = model('Register')->registerConfig($code);
        if($code==200){
            $boolean=model('Register')->register();
            $code = $boolean?200:-200;
        }
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg,
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
    //忘记原密码通过短信验证后重置密码
    public  function doFindpasswordPost()
    {
        $code = model('Password')->findPasswordValidateReq(req('Post'));
        $msg = model('Password')->returnNews();
        if($code==200){
            $code = model('Password')->findPassword(req('Post')['password'])?200:-200;
        }
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg[$code],
        ]);
    }
    //注册短信验证码
    public function doRegisterauthcodePost()
    {
        $code = model('Register')->registerCheckCodeValidateReq(req('Post'));
        $msg = model('Register')->registerConfig($code);
        if($code==200){
            $authCode = model('Register')->registerCheckCode(req('Post')['phone']);
            if(!empty($authCode)){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg'  => $msg,
                    'data' =>$authCode
                ]);
            }
            $code = -200;
            $msg = 'error';
        }
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg,
        ]);
    }
    //找回密码短信验证码
    public function doFindpsdauthcodePost()
    {
        $code = model('Password')->findPasswordCheckCodeValidateReq(req('Post'));
        $msg = model('Password')->returnNews($code);
        if($code==200){
            $authCode = model('Password')->findPasswordCheckCode(req('Post')['phone']);
            if(!empty($authCode)){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg'  => $msg,
                    'data' =>$authCode
                ]);
            }
            $code = -200;
            $msg = 'error';
        }
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg,
        ]);
    }

    public function doIndex()
    {
        $verify = md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800');
        view('',[
            'verify'=> $verify
        ]);
    }
}