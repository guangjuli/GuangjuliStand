<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-19
 * Time: 15:16
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Password implements ModelInterface
{
    public function depend()
    {
        // TODO: Implement depend() method.
    }

    //TODO:加密算法待确定
    public function checkPassword($password)
    {
        $check=false;
        $userInfo = model('User')->getUserInfoByUserId();
        if($password == md5($userInfo['password']))$check=true;
        return $check;
    }

    public function resetPassword(Array $req)
    {
        $oldPassword = $req['old_password'];
        $newPassword = $req['password'];
        $confirmPassword = $req['confirm_password'];
        if($this->checkPassword($oldPassword)){
            $code = model('Validate')->validateNumberLetter($newPassword)?($newPassword==$confirmPassword?200:-201):-203;
            if($code==200){
               $code = model('User')->updateUserByUserId(['password'=>$newPassword])?200:-200;
            }
        }else{
            $code= -202;
        }
        return $code;
    }

    public function findPassword($req)
    {
       $field = ['password','confirm_password','verify','time','deviceId'];
       if(!model('Validate')->validateParams($field,$req))return -204;
       if(!model('Token')->verify($req)) return -207;
       //未验证手机号和验证码的正确性，交由App验证,  如需添加可在此处
       $code = model('Validate')->validateNumberLetter($req['password'])?($req['password']==$req['confirm_password']?200:-201):-203;
       //此处200表示通过参数客户端等验证， 下面数据库校验
       if($code==200){
           //验证用户是否存在
           $userInfo = model('User')->getUserByLogin($req['phone']);
           if(empty($userInfo))return -206;
           $userId = $userInfo['userId'];
           $code = model('User')->updateUserByUserId(['password'=>$req['password']],$userId)?200:-200;
       }
       return $code;
    }

    public function returnNews()
    {
        return[
            200=>'Succeed',
            -200=>'System Exception',
            -201=>'两次密码输入不一致',
            -202=>'原密码错误',
            -203=>'密码格式错误',
            -204=>'必填参数不能为空',
            -205=>'手机号和验证码不一致或验证码错误',
            -206=>'该手机号未注册',
            -207=>'没有权限'
        ];
    }

}