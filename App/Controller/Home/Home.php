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


//
//        //当前菜单
        $menu = adsdata('data/data/Menuall');
//
//        //当前菜单top
        $menutop = adsdata('data/data/Menutop');
//



        D($menutop);

//        $res = \App\Ads::getInstance()->package('Sim')->help();
        //$res = \App\Ads::getInstance()->pds('base/home/index',['title'=>'testtitle']);
        R('/ads/');




        D(req());

    }



}
