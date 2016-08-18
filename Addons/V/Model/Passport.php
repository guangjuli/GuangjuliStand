<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 16:31
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Passport implements ModelInterface
{
    public function depend()
    {
        return [
            'Server::Db',
            'Model::User',
            'Model::Validate',
            'Model::Token'
        ];
    }

    public function registerConfig()
    {
        return[
            'field'=>['verify','time','deviceId','phone','password','type','checkcode'],
            'returnNews'=> [
                200  =>'succeed',
                -200 =>'系统异常',
                -204 =>'表单信息均为必填，不能为空',
                -205 =>'没有权限',
                -202 =>'该手机号和已验证号码不一致或尚未手机号验证',
                -206 =>'验证码不正确',
                -203 =>'密码格式不正确',
                -400 =>'该手机号已经注册!'
            ]
        ];
    }

    //校验成功后加入bus待存储的数据
    private function isSuccessReturnBus($req)
    {
        $type = strtolower($req['type'])=='android'?'android':'ios';
        //插入到user和device表的数据
        //TODO: 密码尚没有加密
        bus(['register'=>[
            'device'=>$req['deviceId'],
            'login'=>$req['phone'],
            'password'=>$req['password'],
            'type'=>$type
        ]]);
    }

    public function validateRegisterReq(Array $req)
    {

         /*//调用获取注册验证码后才会加入bus('code')没有则验证不通过
         bus([
           'code'=>[
               'phone'=>112,
               'code'=>23456
           ]
        ]);*/
        //校验请求参数在对应$field中参数非空
        $field=$this->registerConfig()['field'];
        if(!model('Validate')->validateParams($field,$req))return $code = -204;
        //校验verify是否为自己的用户
        $req['login'] = $req['phone'];
        if(!model('Token')->verify($req))return $code = -205;
        //校验电话号和已短信验证的号码是否一致
        if(bus('code')['phone']!=$req['phone'])return $code = -202;
        //校验验证码
        if(bus('code')['code']!=$req['checkcode'])return $code = -206;
        //校验密码格式
        if(!model('Validate')->validateNumberLetter($req['password']))return $code = -203;
        //校验手机号是否已注册
        if(model('User')->isExistUserByLogin($req['phone']))return $code = -400;
        //验证通过，将待存储数据加入bus()
        $this->isSuccessReturnBus($req);
        return $code = 200;
    }

    public function register(){
        if(!bus('register'))return false;
        $register = bus('register');
        $userId = model('User')->insertUserReturnId($register);
        if(empty($userId))return false;
        $device = [
          'userId'=>$userId,
          'device'=>$register['device']
        ];
        $checkIsInsert = model('Device')->insertDevice($device);
        if(!$checkIsInsert)return false;
        return true;
    }

}