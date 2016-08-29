<?php
namespace Ads\Gui\Controller\Home;

class Home extends BaseController
{

    public function __construct(){
        parent::__construct();
    }

    public function doIndexPost()
    {
        \App\Ads::Run();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
        //test it : http://gst.so/Man?base/home/index
        server('Smarty')->ads('gui/home/index')->display('',[
            "Nav"         =>"gui/home/Nav",
            "Navleft"     =>"gui/home/Navleft",
            "Breadcrumb"  =>"gui/home/Breadcrumb",
            "Tip"         =>"gui/home/Tip",
            "Levelthree"  =>"gui/home/Levelthree",
            "Footer"      =>"gui/home/Footer",
            'html'      => \App\Ads::Run()
        ]);
    }

    public function doNav()
    {
        return 'nav';
    }

    public function doNavleft()
    {
        return 'navleft';
    }

    public function doBreadcrumb()
    {
        return 'doBreadcrumb';
    }

    public function doTip()
    {
        return 'doTip';
    }

    public function doLevelthree()
    {
        return 'doLevelthree';
    }

    public function doFooter()
    {
        return 'doFooter';
    }




}
