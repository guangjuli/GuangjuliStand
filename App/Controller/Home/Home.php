<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
view();
        //$res = model('menu')->menuMainsub();
        //$res = model('widget')->adminNav();
//D($res);
    }

    public function doHelp1()
    {
        view();
    }

    public function doHelp2()
    {
        view();
    }

    public function doLogin()
    {

    }

}
