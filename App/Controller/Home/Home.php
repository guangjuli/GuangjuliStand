<?php
namespace App\Controller;


class Home extends BaseController
{

    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }


    /**
     * 后台首页
     */
    public function doIndex()
    {

        \App\Ads::Run();

       // $res = adsdata('Map/Home/Det');
        D($res);




//        $res = adsdata('data/home/Api');     //平行菜单

//        $res = adsdata('Menu/widget/Breadcrumb');     //平行菜单
       // $res = adsdata('Menu/data/MenuId');
        //$res = adsdata('Menu/widget/Nav');

//        $res = adsdata('data/data/AdminBase');
//        $res = adsdata('Menu/data/widgetNav');
//        $res = adsdata('Menu/widget/Nav');
        $res = adsdata('Menu/Widget/NavLevelThree');

echo $res;
        exit;
        D($res);
//        D(req());
//        R('/ads/');
    }



}
