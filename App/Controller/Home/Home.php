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

//        $res = \App\Ads::getInstance()->package('Sim')->help();
        //$res = \App\Ads::getInstance()->pds('base/home/index',['title'=>'testtitle']);
D(req());
D($res);
        R('/ads/');




        D(req());

    }



}
