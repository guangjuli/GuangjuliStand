<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-07
 * Time: 9:49
 */

namespace Addons\Model;


class Userinfo
{
    public function updateUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $insert = server('Db')->autoExecute('user_info', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function isExistUserInfoById($id)
    {
        if(!is_int($id))return false;
        $id = server('Db')->getOne("select `userId` from user_info where `userId`=$id");
        return $id?true:false;
    }

    public function insertUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $array['userId'] = $userId;
        $insert = server('Db')->autoExecute('user_info', $array, 'INSERT');
        return $insert?true:false;
    }

    public function submitUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(empty($userId)) return false;
        if($this->isExistUserInfoById($userId)){
            $check = $this->updateUserInfo($array,$userId);
        }else{
           $check = $this->insertUserInfo($array,$userId);
        }
        return $check;
    }

    //TODO:待指定获取用户信息的具体参数,目前调试阶段返回全部信息,
    //用户信息表，userId，也是唯一的
    public function getUsrInfoDetailByUserId($userId)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        $userInfoDetail = server('Db')->getRow("select * from user_info where `userId`={$userId}");
        return $userInfoDetail?:[];
    }

}