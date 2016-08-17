<?php

namespace Addons\Controller;
use Addons\Traits\AjaxReturn;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 16:27
 */
class Register
{
    use AjaxReturn;

    public function register()
    {
        $req = req('Post');
        if(!model('Passport')->validateRegisterReq($req)){
            $this->AjaxReturn([
                'code' => -204,
                'msg' => '表单信息均为必填，不能为空'
                 ]);
        }
        if(!model('User')->isExistUserByLogin($req['login'])){
            $this->AjaxReturn([
                'code' => -400,
                'msg' => '该手机号已经注册!'
            ]);
        }
        //校验手机号是否短信验证过，且是否为验证过的手机号
        if(bus('code')['phone']!=$req['phone']) return false;
        //校验密码格式(6-20位大小写字母数字)
        if(!model('Validate')->validateNumberLetter($req['password']))return false;
    }
}