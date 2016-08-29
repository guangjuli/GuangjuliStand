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
        //后台根路径
        $root = adsdata('base/data/Rootpath');




//        echo $root;
        D(adsdata('Menu/Home/Data'));
        //echo adsdata('Menu/Home/NavLeft');
       // echo adsdata('Menu/Home/NavLeft');
        //(new \Ads\Menu\Controller\Home\Home())->Nav();
    }



}
