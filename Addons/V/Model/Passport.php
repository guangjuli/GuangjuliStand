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

    public function validateRegisterReq(Array $req)
    {
        $field=['verify','time','deviceId','phone','password','type'];
        //校验请求参数在对应$field中参数非空
        if(!model('Validate')->validateParams($field,$req))return false;
        //校验verify是否为自己的用户
        $req['login'] = $req['phone'];
        if(!model('Token')->verify($req)) return false;
       return true;
    }

    public function register(){

    }

}