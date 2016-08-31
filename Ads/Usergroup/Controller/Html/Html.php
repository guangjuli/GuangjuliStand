<?php
namespace Ads\Usergroup\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('db')->getall("select * from `user_group` order by groupId desc");
        return  server('Smarty')->ads('usergroup/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from user_group WHERE groupId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //D($res);
        server('db')->autoExecute('user_group',$res,'INSERT');
        R('/man/?usergroup/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('usergroup/html/add')->fetch('',[
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
