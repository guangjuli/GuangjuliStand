<?php
namespace Ads\Menu\Controller\Widget;

class Widget {

    public function __construct(){
        //赋值
        server('Smarty')->assign([
        ]);
    }

    public function doNav()
    {
        $res = adsdata('Menu/data/WidgetNav');
        return server('Smarty')->ads('Menu/Widget/Nav')->fetch('',[
           'menu_nav' => $res
        ]);
    }


    public function doNavLeft()
    {
        $res = adsdata('Menu/data/WidgetNavLeft');
        return server('Smarty')->ads('Menu/Widget/NavLeft')->fetch('',[
            'menu_navleft'=>$res
        ]);
    }

    public function doNavLevelThree()
    {
        $res = adsdata('Menu/data/NavLevelThree');
        return server('Smarty')->ads('Menu/Widget/NavLevelThree')->fetch('',[
            'menu_navlevelthree'=>$res
        ]);
    }

    public function doBreadcrumb()
    {
        $res = adsdata('Menu/data/Breadcrumb');
        return server('Smarty')->ads('Menu/Widget/Breadcrumb')->fetch('',[
            'menu_breadcrumb'=>$res
        ]);
    }

}
