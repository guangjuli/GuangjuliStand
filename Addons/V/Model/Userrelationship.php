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


}