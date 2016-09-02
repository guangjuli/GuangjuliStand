<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-02
 * Time: 10:17
 */

namespace Ads\User\Controller\Html;


class Html
{
    use \App\Traits\AjaxReturnHtml;

    public function doIndex()
    {

    }
    //获取所有用户信息
    //TODO:是否做分页
    public function doList()
    {
        $list = server('Db')->getAll("select * from `user` order by sort desc,userId desc");
        $group = $this->getUserGroupMap();
        return  server('Smarty')->ads('user/html/list')->fetch('',[
            'list' => $list,
            'group'=>$group
        ]);
    }

    //添加
    public function doAdd()
    {
        $group = $this->getUserGroupMap();
        return  server('Smarty')->ads('user/html/add')->fetch('',[
            'group'=>$group
        ]);
    }
    public function doAddPost()
    {
        $login = req('Post')['login'];
        $checkLogin = server('Db')->getOne("select `userId` from user where `login` = '{$login}'");
        if($checkLogin){
            $msg['login'] = '该用户已存在';
            $this->AjaxReturn([
                'msg'   => $msg,
                'url'   =>'/man/?user/html/add'
            ]);
        }
        $req = req('Post');
        if($this->validateUser($req)){
            $req = saddslashes($req);
            server('Db')->autoExecute('user', $req, 'INSERT');
            R('/man/?user/html/list');
        }
        return  server('Smarty')->ads('user/html/add')->fetch('',[
            'row'=>$req
        ]);
    }

    private function validateUser(Array $req)
    {
        if(!application('Validate')->validatePhone($req['login']))return false;
        if(!application('Validate')->validateNumberLetter($req['password']))return false;
        if($req['password']!=$req['confirm_password'])return false;
        return true;
    }

    //修改
    public function doEdit()
    {
        $userId = intval(req('Get')['userId']);
        $userInfo = server('Db')->getRow("select * from `user` where `userId`={$userId}");
        $group = $this->getUserGroupMap();
        return  server('Smarty')->ads('user/html/edit')->fetch('',[
            'row'=>$userInfo,
            'group'=>$group
        ]);
    }
    public function doEditPost()
    {
        $req = req('Post');
        $userId = intval($req['userId']);
        unset($req['userId']);
        $where = "`userId` = {$userId}";
        $req = saddslashes($req);
        server('Db')->autoExecute('user', $req, 'UPDATE',$where);
        R('/man/?user/html/list');
    }

    //删除
    public function doDelete()
    {
        $userId = intval(req('Get')['userId']);
        $this->deleteUser($userId);
        $this->AjaxReturn([]);
    }
    //删除用户
    private function deleteUser($userId)
    {
        $userId = intval($userId);
        //判断关联表user_info是否存在，若存在一同删除指定id行
        $isExistTableUserInfo = $this->isExistTable('user_info');
        if($isExistTableUserInfo){
            server('Db')->query("delete from `user_info` where `userId`={$userId}");
        }
        //删除user表信息
        $check = server('Db')->query("delete from `user` where `userId`={$userId}");
        return $check?true:false;
    }

    //获取用户组的map集合
    private function getUserGroupMap()
    {
        $group = array();
        if($this->isExistTable('user_group')){
            $group = server('Db')->getMap("select `groupId`,`groupName` from user_group ");
        }
        return empty($group)?[]:$group;
    }

    //判断数据库中表是否存在
    public function isExistTable($table)
    {
        $database = server()->Config('Db')['database'];
        $isExistTable= server('Db')->getAll("SELECT table_name FROM information_schema.tables WHERE table_name = '{$table}'and table_schema = '{$database}'");
        return $isExistTable?true:false;
    }
}