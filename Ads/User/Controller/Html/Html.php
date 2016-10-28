<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-02
 * Time: 10:17
 */

namespace Ads\User\Controller\Html;

class Html extends BaseController
{
    use \App\Traits\AjaxReturnHtml;
    use \Ads\Api\Traits\Arr;

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {

    }
    //获取所有用户信息
    //TODO:是否做分页
    public function doList()
    {
        $list = fc("getUserList");
        $group = fc("getUserGroupMap");
        return  server('Smarty')->ads('user/html/list')->fetch('',[
            'list' => $list,
            'group'=>$group
        ]);
    }

    //添加
    public function doAdd()
    {
        $group = fc("getUserGroupMap");
        return  server('Smarty')->ads('user/html/add')->fetch('',[
            'group'=>$group
        ]);
    }
    public function doAddPost()
    {
        $req = req('Post');
        //校验用户参数
        $this->validateUser($req);
        //添加进Db
        $req = saddslashes($req);
        server('Db')->autoExecute('user', $req, 'INSERT');
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?user/html/list'
        ]);
    }

    //响应手机号验证请求
    public function doCheckloginPost()
    {
        $login = req('Post')['login'];
        if(application('Validate')->validatePhone($login)){
            $checkLogin = fc("getUserInfoByLogin",$login);
            if(!empty($checkLogin)){
                $msg['login'] = '该用户已存在';
                $this->AjaxReturn([
                    'msg'   => $msg,
                ]);
            }
        }
    }

    //修改
    public function doEdit()
    {
        $userId = intval(req('Get')['userId']);
        $userInfo = fc("getUserInfoByUserId",$userId);
        $group = fc("getUserGroupMap");
        return  server('Smarty')->ads('user/html/edit')->fetch('',[
            'row'=>$userInfo,
            'group'=>$group
        ]);
    }
    public function doEditPost()
    {
        $req = req('Post');
        //校验用户参数
        $this->validateUser($req);
        $userId = intval($req['userId']);
        unset($req['userId']);
        $where = "`userId` = {$userId}";
        $req = saddslashes($req);
        server('Db')->autoExecute('user', $req, 'UPDATE',$where);
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?user/html/list'
        ]);
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
        $isExistTableUserInfo = $this->isExistTable('patient');
        if($isExistTableUserInfo){
            server('Db')->query("delete from `patient` where `userId`={$userId}");
        }
        //删除user表信息
        $check = server('Db')->query("delete from `user` where `userId`={$userId}");
        return $check?true:false;
    }

    //校验用户参数
    //适用于添加用户和编辑用户
    private function validateUser(Array $req)
    {
        //校验电话格式
        if(application('Validate')->validatePhone($req['login'])){
            $login = $req['login'];
            $user= fc("getUserInfoByLogin",$login);
            $dbLogin = null;
            if($req['userId']){
                $dbUser = fc("getUserInfoByUserId",$req['userId']);
                $dbLogin = $dbUser['login'];
            }
            //校验修改
            if(!empty($dbLogin)&&$login!=$dbLogin&&$req['type']=='edit'){
                if($user){
                    $msg['login']='该用户已存在';
                }
            }
            //校验添加
            if($req['type']=='add'){
                if($user){
                    $msg['login']='该用户已存在';
                }
            }
        }else{
            $msg['login']='请正确输入';
        }
        if(!application('Validate')->validateNumberLetter($req['password']))$msg['password']='密码格式错误';
        if($req['password']!=$req['confirm_password'])$msg['confirm_password']='两次输入不一致';
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
    }

    //获取用户组的map集合
    public function doGetusergroupmap()
    {
        $group = array();
        if(fc('isExistTable','user_group')){
            $group = server('Db')->getMap("select `groupId`,`groupName` from user_group ");
        }
        return empty($group)?[]:$group;
    }

    //判断数据库中表是否存在
    public function doIsexisttable($table)
    {
        $database = server()->Config('Db')['database'];
        $isExistTable= server('Db')->getAll("SELECT table_name FROM information_schema.tables WHERE table_name = '{$table}'and table_schema = '{$database}'");
        return $isExistTable?true:false;
    }

    //获取用户列表
    public function doGetuserlist()
    {
        $list = server('Db')->getAll("select * from `user` order by sort desc,userId desc");
        return $list?:[];
    }

    //通过login获取用户信息
    public function doGetuserinfobylogin($login)
    {
        $login = saddslashes($login);
        $checkLogin = server('Db')->getRow("select `userId`,`login`,`password`,`orgId`,`groupId` from user where `login` = '{$login}'");
        return $checkLogin?:[];
    }

    //通过userId获取 用户信息
    public function doGetuserinfobyuserid($userId)
    {
        $userId = intval($userId);
        $userInfo = server('Db')->getRow("select * from user where `userId`={$userId}");
        return $userInfo?:[];
    }

    //根据userId组成的数组获取id,login组成的map集合
    public function doGetusermapidtologin(array $userId)
    {
        if(empty($userId)) return [];
        $userIdString = '('.implode(',',$userId).')';
        $user = server('Db')->getMap("select userId,login from user where userId in $userIdString");
        return $user?:[];
    }
}