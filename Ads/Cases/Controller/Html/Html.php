<?php
namespace Ads\Cases\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('Db')->getAll("select * from `case` order by sort desc,caseId desc");
        //多表查询，user表，user_info表
        $user = server('Db')->getAll("select u.userId,login,trueName,gender from user u ,user_info",'userId');
        $newList = array();
        for($i=0;$i<count($list);$i++){
            $newList[] = array_merge($user[$list[$i]['userId']],$list[$i]);
        }
        return  server('Smarty')->ads('cases/html/list')->fetch('',[
            'list' => $newList
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from case WHERE caseId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //D($res);
        server('db')->autoExecute('case',$res,'INSERT');
        R('/man/?cases/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('cases/html/add')->fetch('',[
        ]);
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
