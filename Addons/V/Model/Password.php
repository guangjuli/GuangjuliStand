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
        return[
          'Model::User',
          'Model::Validate',
          'Model::Token',
          'Model::Sms'
        ];
    }

    //TODO:加密算法待确定
    /**
     * 检查密码
     * @param $password
     * @return boolean
     */
    public function checkPassword($password)
    {
        $check=false;
        $userInfo = model('User')->getUserInfoByUserId();
        if($password ==$userInfo['password'])$check=true;
        return $check;
    }

    /**
     * 重置密码验证请求参数
     * @param $req
     * @return int
     */
    public function resetPasswordValidateReq(Array $req)
    {
        $oldPassword = $req['old_password'];
        $newPassword = $req['password'];
        $confirmPassword = $req['confirm_password'];
        if($this->checkPassword($oldPassword)){
            $code = model('Validate')->validateNumberLetter($newPassword)?($newPassword==$confirmPassword?200:-201):-203;
        }else{
            $code= -202;
        }
        return $code;
    }

    /**
     * 重置密码
     * @param $password
     * @return boolean
     */
    public function resetPassword($password)
    {
        return model('User')->updateUserByUserId(['password'=>$password]);
    }

    /**
     * 找回密码验证请求
     * @param $req
     * @return int
     */
    public function findPasswordValidateReq($req)
    {
       $field = ['password','confirm_password','verify','time','deviceId'];
        //验证用户是否存在
       $userInfo = model('User')->getUserByLogin($req['phone']);
       if(empty($userInfo))return -206;
       if(!model('Validate')->validateParams($field,$req))return -204;
       if(!model('Token')->verify($req)) return -207;
       //未验证手机号和验证码的正确性，交由App验证,  如需添加可在此处
       $code = model('Validate')->validateNumberLetter($req['password'])?($req['password']==$req['confirm_password']?200:-201):-203;
       if($code==200){
           bus([
              'findPassword'=>[
                  'userId'=>$userInfo['userId']
              ]
           ]);
       }
       return $code;
    }

    /**
     * 重置密码
     * @param $password
     * @return boolean
     */
    public function findPassword($password)
    {
        return model('User')->updateUserByUserId(['password'=>$password],bus('findPassword')['userId']);
    }

    /**
     * 找回密码获取验证码校验请求参数
     * @param $req
     * @return int
     */
    public function findPasswordCheckCodeValidateReq($req)
    {
        $field = ['phone','verify','time','deviceId'];
        if(!model('Validate')->validateParams($field,$req)||!model('Token')->verify($req)) return -207;
        if(!model('User')->isExistUserByLogin($req['phone']))return -206;
        return 200;
    }

    /**
     * 找回密码获取验证码
     * @param $phone
     * @return int
     * 验证码存在返回，不存在返回空值
     */
    public function findPasswordCheckCode($phone)
    {
        return model('Sms','findPassword')->sendMessage($phone);
    }

    public function returnNews($code='')
    {
        $return = [
            200=>'Succeed',
            -200=>'System Exception',
            -201=>'两次密码输入不一致',
            -202=>'原密码错误',
            -203=>'密码格式错误',
            -204=>'必填参数不能为空',
            -205=>'手机号和验证码不一致或验证码错误',
            -206=>'该手机号未注册',
            -207=>'没有权限',
            -208=>'note send error, could you please resend',
        ];
        $return = $code?$return[$code]:$return;
        return $return;
    }

}