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
            "gui_Tip"         =>"Gui/home/Tip",
            "gui_Footer"      =>"Gui/home/Footer",
            'gui_html'      => $html
        ]);
    }


    public function doIsAdminLogin()
    {
        return Application('AdminAuth')->isLogin();
    }

    public function doFooter()
    {
        if(!fc("System_Gui_Footer")){
            return '';
        }else{
            return "<hr><footer>@copy shampeak</footer>";
        }

    }

    public function doTip()
    {
        if(!fc("System_Gui_Tip")){
            return '';
        }else{
            return '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning!</strong> Better check yourself, you\'re not looking too good.</div>';
        }

    }





}
