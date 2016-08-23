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
    public function getMapUserGroup()
    {
        return server('Db')->getMap("select groupId,groupName from user_group");
    }
}