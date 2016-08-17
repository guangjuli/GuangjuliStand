<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 16:47
 */

namespace Addons\Model;


class User
{
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

    public function insertUser(Array $req)
    {
        $insert = server('Db')->autoExecute('user', $req, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }
}