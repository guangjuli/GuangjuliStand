<?php
namespace App\Controller;


class Man extends BaseController
{

    public function __construct(){
        parent::__construct();
    }

    public function doIndexPost()
    {
        //前台调用
        \App\Ads::Gui();     //路由like http://gst.so/?sdfsdf/sdf/dsf
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
        //前台调用
        \App\Ads::Gui();     //路由like http://gst.so/?sdfsdf/sdf/dsf
    }

    public function doLoginPost()
    {
        //前台调用
        \App\Ads::Run();

    }

    /**
     * 后台首页
     */
    public function doLogin()
    {
        adsdata('gui/html/Login');
    }

    public function doLogout()
    {
        adsdata('gui/html/Logout');
    }


}
