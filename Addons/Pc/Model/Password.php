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
     * @param string $password
     * @param int $userId
     * @return boolean
     */
    public function checkPassword($password,$userId=null)
    {
        //返回值初始化
        $check=false;
        $userInfo = model('User')->getUserInfoByUserId($userId);
        if(!empty($password)&&$password ==$userInfo['password'])$check=true;
        return $check;
    }

    /**
     * 重置密码
     * @param string $oldPassword
     * @param string $newPassword
     * @param int $userId
     * @return boolean
     */
    public function resetPassword($oldPassword,$newPassword,$userId=null)
    {
        $check = false;
        $userId = $userId?$userId:bus('tokenInfo')['userId'];
        if($this->checkPassword($oldPassword,$userId)){
            $check = model('User')->updateUserByUserId(['password'=>$newPassword],$userId);
        }
        return $check;
    }

    /**
     * 找回密码验证请求
     * @param array $req
     * $req中包含的键名：'password','confirm_password','verify','time','deviceId'
     * @return int
     */
    public function findPasswordValidateReq(Array $req)
    {
        //校验是否是用户凭证
        if(!model('Token')->verify($req)) return -207;
        //验证用户是否存在
       $userInfo = model('User')->getUserByLogin($req['phone']);
       if(empty($userInfo))return -206;
        //参数存在性检验
        $field = ['password','verify','time','deviceId'];
       if(!model('Validate')->validateParams($field,$req))return -204;
        bus([
            'findPassword'=>[
                'userId'=>$userInfo['userId']
            ]
        ]);
        return 200;
    }

    /**
     * 重置密码
     * @param string $password
     * @param int $userId
     * @return boolean
     */
    public function findPassword($password,$userId=null)
    {
        return model('User')->updateUserByUserId(['password'=>$password],$userId);
    }

    /**
     * 找回密码获取验证码校验请求参数
     * @param array $req
     * $req中包含的键名 'phone','verify','time','deviceId'
     * @return int
     */
    public function findPasswordCheckCodeValidateReq(Array $req)
    {
        //校验操作令牌
        $field = ['phone','verify','time','deviceId'];
        if(!model('Validate')->validateParams($field,$req)||!model('Token')->verify($req)) return -207;
        //校验用户是否存在
        if(!model('User')->isExistUserByLogin($req['phone']))return -206;
        return 200;
    }

    /**
     * 找回密码获取验证码
     * @param string $phone
     * @return int
     * 验证码存在返回，不存在返回空值
     */
    public function findPasswordCheckCode($phone)
    {
        return model('Sms','findPassword')->sendMessage($phone);
    }

    public function returnNews($code)
    {
        $return = [
            200=>'Succeed',
            -209=>'System Exception',
            -201=>'两次密码输入不一致',
            -202=>'原密码错误',
            -203=>'密码格式错误',
            -204=>'必填参数不能为空',
            -205=>'手机号和验证码不一致或验证码错误',
            -206=>'该手机号未注册',
            -207=>'没有权限',
            -208=>'note send error, could you please resend',
        ];
       return $return[$code];
    }

}