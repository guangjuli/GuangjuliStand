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