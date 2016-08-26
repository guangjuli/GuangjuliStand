<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 15:25
 */

namespace Addons\Model;


class Usergroup
{
    /**
     * 获取用户组map集合
     * @return array
     */
    public function getMapUserGroup()
    {
       $map = server('Db')->getMap("select groupId,groupName from user_group");
       return $map?$map:[];
    }
}