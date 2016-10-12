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
        return[
            'Model::Token',
            'Model::Validate',
            'Server::Db',
            'Model::Upload'
        ];
    }

    /**
     * getUserByLogin
     * 根据login获取用户信息
     * @param string $login
     * @return array
     */
    public function getUserByLogin($login)
    {
        if(!is_string($login))return [];
        $group=model('Usergroup')->getMapUserGroup();
        $user = server('Db')->getRow("select `login`,`password` from user where login = '$login' and groupId in ({$group['nurse']},{$group['doctor']})");
        return $user?:[];
    }
    /**
     * 判断用户是否存在
     * @param string $login
     * @return boolean
     */

    public function isExistUserByLogin($login)
    {
        $user = $this->getUserByLogin($login);
        return empty($user)?false:true;
    }


    //TODO:待指定详细返回值
    /**
     * 依据token获取用户信息
     * @param int $userId
     * @return array
     */
    public function getUserInfoByToken($userId=null)
    {
        $filed=['trueName','login','gravatar','gender','birthday','height'];
        $filed = implode(',',$filed);
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        $userInfo = server('Db')->getRow("select $filed from user u,user_info ui where u.userId = $userId");
        return $userInfo?:[];
    }

    /**
     * 根据userId获取用户信息
     * @param $userId
     * @return array
     */
    public function getUserInfoByUserId($userId=null)
    {   //参数设置
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        if(empty($userId)) return [];
        //执行sql
        $userInfo = server('Db')->getRow("select * from user where userId = $userId");
        return $userInfo?:[];
    }

    /**
     * 判断用户是否存在
     * @param int $userId
     * @return boolean
     */
    public function isExistUserByUserId($userId)
    {
        $user = $this->getUserInfoByUserId($userId);
        return empty($user)?false:true;
    }
    /**
     * 根据orgId获取用户列表
     * @param $orgId
     * @return array
     */
    public function getPatientListByOrgId($orgId)
    {
        $userList = [];
        $patient = [];
        $orgId = intval($orgId);
        $group = model('Usergroup')->getMapPatient();
        if(!empty($group)){
            $userList = server('Db')->getAll("select userId from user where orgId={$orgId} and groupId in {$group}");
        }
        foreach($userList as $v){
            $patient[] = $v['userId'];
        }
        return $patient;
    }

    public function getOrgIdByUserId($userId)
    {
        $userId = intval($userId);
        $orgId = server('Db')->getOne("select `orgId` from user where `userId` = {$userId}");
        return $orgId?:null;
    }

}