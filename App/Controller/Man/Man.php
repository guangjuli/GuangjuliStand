<?php
namespace App\Controller;


class Man extends BaseController
{

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {



        //前台调用
        $res = \App\Ads::Gui();     //路由like http://gst.so/?sdfsdf/sdf/dsf
        D($res);
    }


    /**
     * 后台首页
     */
    public function doIndex123()
    {


        //前台调用
        $res = \App\Ads::Run();     //路由like http://gst.so/?sdfsdf/sdf/dsf
        $res = \App\Ads::Run('w/e/r');
//        $res = \App\Ads::getInstance()->Package('qq')->d('ww')->s('ss');
//        $res = \App\Ads::getInstance()->ads('aaa/ddd/sss');
//        $res = \App\Ads::getInstance()->Package('aaa')->ds("wwwww/wwwwww");

        /**
         * 后台用到的
         */
        $res = \App\Ads::getInstance()->Package($ads);
        $res = \App\Ads::getInstance()->Package($ads)->Ds($d);
        D($res);

        D(req());
        //view();
    }



}
