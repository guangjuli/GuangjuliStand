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

    public function registerConfig($code)
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
        return $config[$code];
    }

    /**
     * 校验注册请求
     * @param array $req
     * @return int
     * 200表示成功，其他编码查看registerConfig($code)显示对应文本
     */
    public function validateRegisterReq(Array $req)
    {
        //验证请求参数
        $field = ['verify','time','deviceId','phone','password','type','deviceType'];
        //验证用户令牌
        if(!model('Validate')->validateParams($field,$req))return $code = -204;
        if(!model('Token')->verify($req))return $code = -205;
        //验证用户是否存在
        if(model('User')->isExistUserByLogin($req['phone']))return $code = -401;
        //校验设备类型
        $deviceTypeMap = model('Device')->getDeviceTypeMap();
        $device = $deviceTypeMap[$req['deviceType']];
        if(!$device) return -402;
        //验证通过，将待存储数据加入bus()
        //TODO:groupId写死了
        $type = strtolower($req['type'])=='android'?'20':'21';
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
     * @param array $register
     * 如果参数经过validateRegisterReq(Array $req)校验，此参数可不填写
     * @return boolean
     */
    public function register($register=[]){
        //参数校验
        $register = $register?:bus('register');
        if(!$register)return false;
        $register['login']=$register['login']?:$register['phone'];
        //执行sql->user
        $userId = model('User')->insertUserReturnId($register);
        if(empty($userId))return false;
        //执行sql->device
        $device = [
          'userId'=>$userId,
          'device'=>$register['device'],
          'deviceTypeId'=>$register['deviceTypeId']
        ];
        $checkIsInsert = model('Device')->insertDevice($device);
        if(!$checkIsInsert){        //如果设备表插入不成功，就删除刚插入user表的数据，最好用事务控制
            model('User')->deleteUserByUserId($userId);
            return false;
        }
        return true;
    }

    /**
     * 注册短信验证码验证请求参数
     * @param array $req
     * @return int
     */
    public function registerCheckCodeValidateReq(Array $req)
    {
        //验证用户令牌
        $field = ['phone','verify','time','deviceId'];
        if(!model('Validate')->validateParams($field,$req)||!model('Token')->verify($req)) return -205;
        //验证手机号是否已存在
        if(model('User')->isExistUserByLogin($req['phone']))return -401;
        return 200;
    }

    /**
     * 注册短信验证码
     * @param string $phone
     * @return int
     * 如果成功返回验证码
     */
    public function registerCheckCode($phone)
    {
        return model('Sms','register')->sendMessage($phone);
    }

}