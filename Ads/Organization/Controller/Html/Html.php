<?php
namespace Ads\Organization\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('db')->getall("select * from `organization` order by sort desc,orgId desc");
        return  server('Smarty')->ads('organization/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from organization WHERE orgId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //D($res);
        server('db')->autoExecute('organization',$res,'INSERT');
        R('/man/?organization/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('organization/html/add')->fetch('',[
        ]);
    }

    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['orgId']);//

        //D($res);
        server('db')->autoExecute('organization',$res,'UPDATE',"orgId = $id");
        R('/man/?organization/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = server('db')->getrow("select * from organization where orgId = $id");
        return  server('Smarty')->ads('organization/html/edit')->fetch('',[
            'row' => $row
        ]);
    }

}
