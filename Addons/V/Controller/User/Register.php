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

    //注册短信验证码
    public function doRegister_authcodePost()
    {
        $code = model('Register')->registerCheckCodeValidateReq(req('Post'));
        $msg = model('Register')->registerConfig($code);
        if($code==200){
            $authCode = model('Register')->registerCheckCode(req('Post')['phone']);
            if(!empty($authCode)){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg'  => $msg,
                    'data' =>[
                        'authCode'=>$authCode
                    ]
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

    public function doRegister()
    {
        $verify = md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800');
        view('',[
            'verify'=> $verify
        ]);
    }
}