<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-02
 * Time: 10:17
 */

namespace Ads\Doctor\Controller\Html;


class Html extends BaseController
{
    use \App\Traits\AjaxReturnHtml;

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
        $list = server('Db')->getAll("select * from user u,doctor d where u.userId=d.userId order by d.sort desc,d.userId desc");
        $org = $this->getOrgMap();
        return  server('Smarty')->ads('doctor/html/list')->fetch('',[
            'list' => $list,
            'org'  =>$org
        ]);
    }

    //添加
    public function doAdd()
    {
        $org = $this->getOrgMap();
        return  server('Smarty')->ads('doctor/html/add')->fetch('',[
            'org'=>$org
        ]);
    }
    public function doAddPost()
    {
        $req = req('Post');
        //校验用户参数
        $this->validateUser($req);
        $req = saddslashes($req);
        //添加进user
        $groupId = $this->getDoctorGroupId();
        if($groupId){
        $add = [
            'login'=>$req['login'],
            'password'=>$req['password'],
            'groupId'=>$groupId,
            'orgId'=>$req['orgId']
        ];
        $userId = $this->insertUserReturnId($add);
        //添加进patient
        $req['userId']=$userId;
        server('Db')->autoExecute('doctor', $req, 'INSERT');
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?doctor/html/list'
        ]);
        }
    }

    //修改
    public function doEdit()
    {
        $userId = intval(req('Get')['userId']);
        $userInfo = server('Db')->getRow("select * from user u,doctor d where u.userId=d.userId and d.userId='{$userId}'");
        $org = $this->getOrgMap();
        return  server('Smarty')->ads('doctor/html/edit')->fetch('',[
            'row'=>$userInfo,
            'org'=>$org
        ]);
    }
    public function doEditPost()
    {
        $req = req('Post');
        //校验用户参数
        if(!application('Validate')->validateNumberLetter($req['password']))$msg['password']='密码格式错误';
        if($req['password']!=$req['confirm_password'])$msg['confirm_password']='两次输入不一致';
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
        $req = saddslashes($req);
        //更改user
        $add = [
            'password'=>$req['password'],
            'orgId'=>$req['orgId']
        ];
        $userId = $req['userId'];
        unset($req['userId']);
        $this->updateUserByUserId($add,$userId);
        $this->updateDoctorByUserId($req,$userId);
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?doctor/html/list'
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
        $check = false;
        $userId = intval($userId);
        //判断关联表user_info是否存在，若存在一同删除指定id行
        if(server('Db')->query("delete from `doctor` where `userId`={$userId}")){
            //删除user表信息
            if(server('Db')->query("delete from `user` where `userId`={$userId}")){
                $check=true;
            }
        };
        return $check;
    }

    //校验用户参数
    //适用于添加用户和编辑用户
    private function validateUser(Array $req)
    {
        //校验电话格式
        if(application('Validate')->validatePhone($req['login'])){
            $login = $req['login'];
            $checkUserId = server('Db')->getOne("select `userId` from user where `login` = '{$login}'");
            if($checkUserId){
                $msg['login']='该手机号已注册';
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
    public function getOrgMap()
    {
        $org = server('Db')->getMap("select orgId,orgName from organization");
        return $org?:[];
    }

    public function insertUserReturnId(Array $array)
    {
        $userId = null;
        $insert = server('Db')->autoExecute('user', $array, 'INSERT');
        if($insert)$userId = server('Db')->insert_id();
        return $userId;
    }

    public function updateUserByUserId(Array $array,$userId)
    {
        $userId = intval($userId);
        $insert = server('Db')->autoExecute('user', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function updateDoctorByUserId(Array $array,$userId)
    {
        $userId = intval($userId);
        $insert = server('Db')->autoExecute('doctor', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    private function getDoctorGroupId()
    {
       $doctorGroupId =  server('Db')->getOne("select groupId from user_group where `chr`='doctor'");
       return $doctorGroupId?:null;
    }
}