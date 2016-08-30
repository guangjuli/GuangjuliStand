<?php
namespace Ads\Menu\Controller\Html;


class Html extends BaseController {

    public function __construct(){
        parent::__construct();
    }



    public function doIndex(){
    }

    public function doIndexc(){
    }

    public function doList(){

        $list = app('db')->getall("select * from menu where parentId = 0");
        return  server('Smarty')->ads('menu/html/list')->fetch('',[
            'list' => $list
        ]);
    }

    public function doAdd(){
        return 'add';
    }


    public function doEdit(){
        return 'list';
    }



}
