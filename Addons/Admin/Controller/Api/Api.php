<?php
namespace Addons\Controller;


class Api extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
        view();
    }


    public function doLog()
    {
        $list = app('db')->getall("select * from api");
        view('',[
            'list'=>$list
        ]);
    }

}
