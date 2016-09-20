<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-19
 * Time: 16:36
 */

namespace Addons\Model;


class Contacts
{
    public function addContacts($req,$userId)
    {
        $userId = intval($userId);
        $req['userId']=$userId;
        $insert = server('Db')->autoExecute('contacts', $req, 'INSERT');
        return $insert?true:false;
    }

    public function deleteContacts($userId,$contactsId)
    {
        $userId = intval($userId);
        $contactsId = intval($contactsId);
        $check = server('Db')->query("delete from contacts where `userId`=$userId and `contactsId`={$contactsId}");
        return $check?true:false;
    }

    public function getContacts($userId)
    {
        $userId = intval($userId);
        $contacts = server('Db')->getAll("select * from contacts where `userId` = {$userId}");
        return $contacts?:[];
    }
}