<?php
namespace App\Controller;


class Man extends BaseController
{

    public function __construct(){
        parent::__construct();
    }

    /**
     * 前端响应地址
     * like /man/res/?aa/dd/ss
     */
    public function doRes()
    {
        \App\Ads::Run();
    }

    public function doResPost()
    {
        \App\Ads::Run();
    }


    /**
     * 后台首页
     */
    public function doIndex()
    {
        \App\Ads::Gui();
    }

    /**
     * //don't use it
     * //todo to be remove
     */
    public function doIndexPost()
    {
        \App\Ads::Gui();
    }

    /**
     * 后台首页
     */
    public function doLogin()
    {
        R('/man/res?gui/html/Login');
        //adsdata('gui/html/Login');
    }

    public function doLogout()
    {
        adsdata('gui/html/Logout');
    }


}
