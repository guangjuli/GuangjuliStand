<?php

namespace Addons\Controller;
use Addons\Traits\AjaxReturn;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-18
 * Time: 11:59
 */
class User
{
    use AjaxReturn;
    //必须通过verifyToken后才能调用以下方法，因为方法内部调用了bus()流
    public function doUserinfosubmitPost()
    {
        //model('Gate')->verifyToken(req('Post')['token']);
        $req = req('Post');
        $user = model('User');
        $msg = $user->paramsConfig()['returnNews'];
        $code = $user->validateUserReq($req);
        if($code==200){
            $check = $user->updateUserByUserId($req);
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
        model('Gate')->verifyToken(req('Post')['token']);
        if($userInfo=model('User')->getUserInfoByToken()){
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
        //model('Gate')->verifyToken(req('Post')['token']);
        $file = $_FILES['tfile'];
        $msg = model('Upload')->returnMsg();
        $code = model('User')->uploadHeadImage($file);
        $this->AjaxReturn([
            'code'=>$code,
            'msg'=>$msg[$code],
        ]);
    }
    //注册
    public function doRegisterPost()
    {
        $req = req('Post');
        $register = model('Register');
        $code = $register->validateRegisterReq($req);
        $msg  = $register->registerConfig($code);
        if($code==200)$code=model('Register')->register();
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg,
        ]);
    }
    //知道原密码重置密码
    public function doResetpasswordPost()
    {
        model('Gate')->verifyToken(req('Post')['token']);
        $req = req('Post');
        $code = model('Password')->resetPassword($req);
        $msg = model('Password')->returnNews();
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg[$code],
        ]);
    }
    //忘记原密码通过短信验证后重置密码
    public  function doFindpasswordPost()
    {
        $req = req('Post');
        $code = model('Password')->findPassword($req);
        $msg = model('Password')->returnNews();
        $this->AjaxReturn([
            'code' => $code,
            'msg' => $msg[$code],
        ]);
    }
    //注册短信验证码
    public function doRegisterauthcodePost()
    {
        $registerReturn = model('Register')->registerCheckCode(req('Post'));
        $code=is_int($registerReturn)?$registerReturn:$registerReturn['code'];
        $msg = model('Register')->registerConfig($code);
        if(is_int($registerReturn)){
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg,
            ]);
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg,
                'data'=>$registerReturn['authCode']
            ]);
        }
    }
    //找回密码短信验证码
    public function doFindpsdauthcodePost()
    {
        $registerReturn = model('Password')->findPasswordCheckCode(req('Post'));
        $code=is_int($registerReturn)?$registerReturn:$registerReturn['code'];
        $msg = model('Password')->returnNews($code);
        if(is_int($registerReturn)){
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg,
            ]);
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg,
                'data'=>$registerReturn['authCode']
            ]);
        }
    }

    public function doIndex()
    {
        $verify = md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800');
        view('',[
            'verify'=> $verify
        ]);
    }
}