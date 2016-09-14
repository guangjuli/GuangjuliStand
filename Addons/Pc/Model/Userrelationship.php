<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 10:41
 */

namespace Addons\Model;

//用户关系表
class Userrelationship
{
    //获取用户关联对象的id
    public function getUserRelationshipByUserId($userId)
    {
        $userId = intval($userId);
        $relation = server('Db')->getRow("select relationship from user_relationship where `userId`=$userId");
        return $relation?:'';
    }

    //插入,只能添加一个关系对象,初始化userId对应的关系时用，其他情况用update
    public function insertRelationship($relationship,$userId)
    {
        //验证操作
        if(!is_int($relationship))return false;
        if(!is_int($userId)) return false;
        $check = server('Db')->query("insert into user_relationship (`userId`,`relationship`) values ({$userId},{$relationship})");
        return $check?true:false;
    }

    //更新关系表
    public function updateRelationship($relationship,$userId)
    {
        //验证操作
        if(!is_int($relationship))return false;
        if(!is_int($userId)) return false;
        $check = server('Db')->query("update user_relationship set `relationship`={$relationship} where `userId` = {$userId}");
        return $check?true:false;
    }

}