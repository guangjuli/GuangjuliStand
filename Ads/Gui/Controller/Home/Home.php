<?php
namespace Ads\Gui\Controller\Home;

class Home extends BaseController
{

    public function __construct(){
        parent::__construct();
    }

    public function doIndexPost()
    {

    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
        server('Smarty')->path(__DIR__.'/../../../../Ads/Gui/Views/')->router([
            'controller'=>'Home',
            'mothed'=>'Index',
        ])->display();
    }


}
