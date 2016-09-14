<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 14:46
 */

namespace Addons\Model;

//联系人信息
class Contacts
{
    //获取联系人
    public function getContacts($userId)
    {
        $userId = intval($userId);
        $contacts = server('Db')->getAll("select * from contacts where userId = {$userId}");
        return $contacts?:[];
    }
}