<?php
namespace Ads\Usergroup\Controller\Html;

class Html extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex(){
    }

    public function doIndexc(){
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        echo '删除'.req('Get')['id'];
    }

    public function doList(){
        $list = server('db')->getall("select * from `user_group` order by groupId desc");
        return  server('Smarty')->ads('usergroup/html/list')->fetch('',[
            'list' => $list
        ]);
    }

    public function doAdd(){
        return  server('Smarty')->ads('usergroup/html/add')->fetch('',[
        ]);
    }

    public function doEdit(){
        return  server('Smarty')->ads('usergroup/html/edit')->fetch('',[
        ]);
    }


//    public function doDet(){
//        return server('Smarty')->ads('group/home/index')->fetch('',[
//        ]);
//    }


}
