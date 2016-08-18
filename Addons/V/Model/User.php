<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 16:47
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class User implements ModelInterface
{
    public function depend()
    {
        // TODO: Implement depend() method.
        return[
            'Model::Token',
        ];
    }

    public function getUserByLogin($login)
    {
        $user = server('Db')->getRow("select * from user where login = '$login'");
        $user = $user?$user:[];
        return $user;
    }
    /**
     * 判断用户是否存在
     *
     */
    public function isExistUserByLogin($login)
    {
        $user = $this->getUserByLogin($login);
        $check = empty($user)?false:true;
        return $check;
    }

    public function insertUser(Array $array)
    {
        $insert = server('Db')->autoExecute('user', $array, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    public function insertUserReturnId(Array $array)
    {
        $userId = '';
        $insert = server('Db')->autoExecute('user', $array, 'INSERT');
        if($insert)$userId = server('Db')->insert_id();
        return $userId;
    }

    public function updateUserByUserId(Array $array)
    {
        //model('Gate')->verifyToken($array['token']);
        $userId = server('Cache')->get($array['token'])['userId'];
        $insert = server('Db')->autoExecute('user', $array, 'UPDATE',"`userId`=$userId");
        $check = $insert?true:false;
        return $check;
    }

    public function paramsConfig()
    {
        return[
            //必填参数
            'field' => ['trueName','gender','birthday'],
            //参数为string类型
            'string' => ['trueName','birthday'],
            //参数为int类型
            'int' => ['gender'],
            'returnNews'=>[
                200 =>'succeed',
                -201 => '必填参数不能为空',
                -202 => '存在格式不正确数据',
                -200 => '系统异常'
            ]
        ];
    }

    public function validateUserReq($req)
    {
        //$req['gender']=intval($req['gender']);
        $config = $this->paramsConfig();
        if(!model('Validate')->validateParams($config['field'],$req)) return -201;
        $paramsType = model('Validate')->validateParamsType($req,$config['string'],$config['int']);
        if(!empty($paramsType)) return -202;
        return 200;
    }
}