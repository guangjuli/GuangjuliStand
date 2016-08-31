<?php
namespace Ads\Menu\Controller\Home;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {

    }


    public function doData()
    {
//        $menudataindex = (new \Ads\Menu\Model\DataMysql())->menuLibIndex();
//        $menudata = (new \Ads\Menu\Model\DataMysql())->menuLib();


        $rs =new \Ads\Menu\Model\Menu();
//D($menudata);
    }






    public function doNav()
    {

        $html = server('Smarty')->path(__DIR__.'/../../../../Ads/Menu/Views/')->router([
            'controller'=>'Menu',
            'mothed'=>'Nav',
        ])->fetch();
        return $html;
    }


}
