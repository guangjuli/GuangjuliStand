<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 16:31
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Register implements ModelInterface
{
    public function depend()
    {
        return [
            'Server::Db',
            'Model::User',
            'Model::Validate',
            'Model::Token',
            'Model::Sms'
        ];
    }

    public function registerConfig($code=null)
    {
        $config = [
            200  =>'succeed',
            -200 =>'系统异常',
            -204 =>'表单信息均为必填，不能为空',
            -205 =>'没有权限',
            -202 =>'该手机号和已验证号码不一致或尚未手机号验证',
            -206 =>'验证码不正确',
            -203 =>'密码格式不正确',
            -401 =>'该手机号已经注册!',
            -402 =>'该设备不存在',
            -208 =>'note send error, could you please resend',
        ];
        $return = $code?$config[$code]:$config;
        return $return;
    }

    /**
     * 校验注册请求
     * @param $req
     * @return int
     */
    public function validateRegisterReq(Array $req)
    {
        //验证请求参数
        $field = ['verify','time','deviceId','phone','password','type','deviceType'];
        if(!model('Validate')->validateParams($field,$req))return $code = -204;
        if(!model('Token')->verify($req))return $code = -205;
        if(!model('Validate')->validateNumberLetter($req['password']))return $code = -203;
        if(model('User')->isExistUserByLogin($req['phone']))return $code = -401;

        //验证通过，将待存储数据加入bus()
        //TODO:groupId写死了
        $type = strtolower($req['type'])=='android'?'20':'18';
        $deviceTypeMap = model('Device')->getDeviceTypeMap();
        $device = $deviceTypeMap[$req['deviceType']];
        if(!$device) return -402;
        //TODO: 密码尚没有加密
        bus(['register'=>[
            'device'=>$req['deviceId'],
            'login'=>$req['phone'],
            'password'=>$req['password'],
            'groupId'=>$type,
            $device =>1,
            'deviceTypeId'=>$req['deviceType']
            ],
        ]);
        return $code = 200;
    }

    /**
     * 注册
     * @return boolean
     */
    public function register($register=[]){
        $register = $register?$register:bus('register');
        if(!$register)return false;
        $register['login']=$register['login']?:$register['phone'];
        $userId = model('User')->insertUserReturnId($register);
        if(empty($userId))return false;
        $device = [
          'userId'=>$userId,
          'device'=>$register['device'],
          'deviceTypeId'=>$register['deviceTypeId']
        ];
        $checkIsInsert = model('Device')->insertDevice($device);
        if(!$checkIsInsert)return false;
        return true;
    }

    /**
     * 注册短信验证码
     * @param array $req
     * @return int
     */
    public function registerCheckCodeValidateReq(Array $req)
    {
        $field = ['phone','verify','time','deviceId'];
        if(!model('Validate')->validateParams($field,$req)||!model('Token')->verify($req)) return -205;
        if(model('User')->isExistUserByLogin($req['phone']))return -401;
        return 200;
    }

    /**
     * 注册短信验证码
     * @param int $phone
     * @return int
     */
    public function registerCheckCode($phone)
    {
        return model('Sms','register')->sendMessage($phone);
    }

}