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
}