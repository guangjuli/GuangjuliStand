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
        $insert = server('Db')->autoExecute('patient', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function isExistUserInfoById($id)
    {
        $id = intval($id);
        $userId = server('Db')->getOne("select `userId` from patient where `userId`='{$id}'");
        return $userId;
        return $userId?true:false;
    }

    public function insertUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $array['userId'] = $userId;
        $insert = server('Db')->autoExecute('patient', $array, 'INSERT');
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
    public function getUsrInfoDetailByUserId($userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        $userInfoDetail = server('Db')->getRow("select p.*,u.login from patient p ,user u where p.userId = u.userId and p.userId ={$userId}");
        if($userInfoDetail['gravatar']){
            $userInfoDetail['gravatar'] = model('Upload')->isAbsolutePath($userInfoDetail['gravatar']);
        }
        return $userInfoDetail?:[];
    }

    public function getGravatarByUserId($userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        $gravatar = server('Db')->getOne("select gravatar from patient where `userId`={$userId}");
        return $gravatar?:'';
    }








}