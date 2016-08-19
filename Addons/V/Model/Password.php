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

    public function returnNews()
    {
        return[
            200=>'Succeed',
            -201=>'两次密码输入不一致',
            -202=>'原密码错误',
            -203=>'密码格式错误',
            -200=>'System Exception'
        ];
    }

}