<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-19
 * Time: 16:36
 */

namespace Addons\Controller;



class User extends BaseController
{
    use \Addons\Traits\AjaxReturn;
    public function __construct()
    {
        parent::__construct();
    }

    public function doContactsPost()
    {
        $userId = bus('tokenInfo')['userId'];
        $list = model('Contacts')->getContacts($userId);
        if($list){
            $this->AjaxReturn([
                'code' => 200,
                'msg' => 'succeed',
                'data'=>$list
            ]);
        }else{
            $this->AjaxReturn([
                'code' => -200,
                'msg' => 'no contacts'
            ]);
        }
    }

    public function doContacts_deletePost()
    {
        $userId = bus('tokenInfo')['userId'];
        $contactsId = req("Post")['contactsId'];
        $check = model('Contacts')->deleteContacts($userId,$contactsId);
        if($check){
            $list = model('Contacts')->getContacts($userId);
            $this->AjaxReturn([
                'code' => 200,
                'msg' => 'succeed',
                'data'=>$list
            ]);
        }else{
            $this->AjaxReturn([
                'code' => -200,
                'msg' => 'error'
            ]);
        }
    }

    public function doContacts_insertPost()
    {
        $req = req('Post');
        $userId = bus('tokenInfo')['userId'];
        $check =model('Contacts')->addContacts($req,$userId);
        if($check){
            $list = model('Contacts')->getContacts($userId);
            $this->AjaxReturn([
                'code' => 200,
                'msg' => 'succeed',
                'data'=>$list
            ]);
        }else{
            $this->AjaxReturn([
                'code' => -200,
                'msg' => 'error'
            ]);
        }
    }
}