<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doHelp()
    {
        view();
    }

    public function doHelp_v1()
    {
        view('help1');
    }

    public function doHelp_v2()
    {
        view('help2');
    }




}
