<?php
namespace Ads\Device\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('Db')->getAll("select * from `bloodpress` group by `userId` order by bloodpressId desc");
        $map = server('db')->getAll("select `login`,`nickName`,`trueName`,`mobile`,`email` from user",'userId');
        return  server('Smarty')->ads('usergroup/html/list')->fetch('',[
            'list' => $list,
            'map'  =>$map
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from bloodpress WHERE bloodpressId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        server('db')->autoExecute('bloodpress',$res,'INSERT');
        R('/man/?bloodpress/html/list');
    }

    public function doAdd(){

        return  server('Smarty')->ads('bloodpress/html/add')->fetch('',[
        ]);
    }

    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['bloodpressId']);//
        server('db')->autoExecute('bloodpress',$res,'UPDATE',"bloodpressId = $id");
        R('/man/?bloodpress/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = server('db')->getrow("select * from bloodpress where bloodpressId = $id");
        return  server('Smarty')->ads('bloodpress/html/edit')->fetch('',[
            'row' => $row
        ]);
    }

}
