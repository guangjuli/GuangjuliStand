<?php
namespace App\Controller;


class Api extends BaseController {

    use \App\Traits\AjaxReturn;

    public function __construct(){
        parent::__construct();
    }

    public function doList_delete()
    {
        $id = intval(req('Get')['id']);
        app('db')->query("delete from api where apiId = $id");

        $this->AjaxReturn();
    }

    /**
     * 后台首页
     */
    public function doList()
    {
        $list = app('db')->getall("select * from api");
        view('',[
            'list'=>$list
        ]);
    }

    public function doList_addPost()
    {
        $res = req('Post');

        //重复性检查
        $v = saddslashes($res['v']);
        $api = saddslashes($res['api']);
        //重复性检查
        $where = "v = '$v' and api = '$api'";
        $row = app('db')->getall("select * from api where $where");
        if($row){
            R('/api/list',5,"api不对");
        }

        $res = saddslashes($res);
        app('db')->autoExecute("api",$res,'INSERT');
        R('/api/list');
        view();
    }

    public function doList_add()
    {
        view();
    }


    public function doList_editPost()
    {
        $id = req('Post')['id'];
        $res = req('Post');

        $v = saddslashes($res['v']);
        $api = saddslashes($res['api']);

        //重复性检查
        $where = "v = '$v' and api = '$api' and apiId != $id";
        $row = app('db')->getall("select * from api where $where");
        if($row){
            R('/api/list',5,"api不对");
        }


        $res = saddslashes($res);
        app('db')->autoExecute("api",$res,'UPDATE',"apiId = $id");
        R('/api/list');
    }

    public function doList_edit()
    {
        $id= req('Get')['id'];
        $row = app('db')->getrow("select * from api where apiId = $id");
        view('',[
            'row'=>$row
        ]);
    }

}
