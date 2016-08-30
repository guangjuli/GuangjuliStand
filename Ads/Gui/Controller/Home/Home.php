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
        //echo adsdata('gui/home/IsAdminLogin');
        //test it : http://gst.so/Man?base/home/index
        $html = \App\Ads::Run();
        server('Smarty')->ads('gui/home/index')->display('',[
            "gui_Nav"         => 'Menu/Widget/Nav',
            "gui_Navleft"     =>"Menu/Widget/Navleft",
            "gui_NavLevelThree"  =>"Menu/Widget/NavLevelThree",
            "gui_Breadcrumb"  =>"Menu/Widget/Breadcrumb",
//            "gui_Tip"         =>"Menu/home/Tip",
//            "gui_Footer"      =>"gui/home/Footer",
            'gui_html'      => $html
        ]);
    }


    public function doIsAdminLogin()
    {
        return Application('AdminAuth')->isLogin();
    }

}
