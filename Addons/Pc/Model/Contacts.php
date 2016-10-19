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
    public function addContacts($req)
    {
        $contactsId = null;
        $req['active']=0;
        $insert = server('Db')->autoExecute('contacts', $req, 'INSERT');
        if($insert)$contactsId = server('Db')->insert_id();
        return $contactsId;
    }

    public function deleteContacts($userId,$contactsId)
    {
        $userId = intval($userId);
        $contactsId = intval($contactsId);
        $check = server('Db')->query("delete from contacts where `userId`=$userId and `contactsId`={$contactsId}");
        return $check?true:false;
    }

    //重置操作，删除所有临时联系人
    public function deleteAllInvalidContacts($userId)
    {
        $userId = intval($userId);
        $check = server('Db')->query("delete from `contacts` where `userId`={$userId} and active=0");
        return $check?true:false;
    }

    public function getContacts($userId)
    {
        $userId = intval($userId);
        $contacts = server('Db')->getAll("select contactsId,name,phone,relationship from contacts where `userId` = {$userId} and active=1");
        if($contacts){
            foreach($contacts as $k=>$v){
                $contacts[$k]['contactsId']=intval($v['contactsId']);
            }
        }
        return $contacts?:[];
    }

    //批量添加联系人
    public function batchInsertContacts(Array $contacts,$userId)
    {
        $userId = intval($userId);
        foreach($contacts as $k=>$v){
            $contacts[$k]['userId'] = $userId;
        }
        return model('Batchinsert')->batchInsert($contacts,'contacts');
    }

    //更新测量计划active=1;
    public function updateContactsActiveByUserId($userId)
    {
        $userId = intval($userId);
        $check = server('Db')->query("update `contacts` set active=1 where userId={$userId}");
        return $check?true:false;
    }
}