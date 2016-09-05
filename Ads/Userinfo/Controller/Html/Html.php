<?php
namespace Ads\Userinfo\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('db')->getall("select * from `user_info` order by sort desc,userInfoId desc");
        return  server('Smarty')->ads('userinfo/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from user_info WHERE userInfoId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //D($res);
        server('db')->autoExecute('user_info',$res,'INSERT');
        R('/man/?userinfo/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('userinfo/html/add')->fetch('',[
        ]);
    }

    public function doCheckuseridPost()
    {
        $userId = intval(req("Post")['userId']);
        if(application('Validate')->validateInt($userId)){
            $login = server('Db')->getOne("select `login` from user where userId = {$userId} ");
            $msg['userId']=$login?"登录名：$login":'没有找到该用户';
        }else{
            $msg['userId']='格式不正确';
        }
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
    }

    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['groupId']);//

        //D($res);
        server('db')->autoExecute('user_group',$res,'UPDATE',"groupId = $id");
        R('/man/?usergroup/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = server('db')->getrow("select * from user_group where groupId = $id");
        return  server('Smarty')->ads('usergroup/html/edit')->fetch('',[
            'row' => $row
        ]);
    }

}
