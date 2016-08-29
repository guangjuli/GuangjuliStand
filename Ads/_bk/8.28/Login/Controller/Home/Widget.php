<?php
namespace Addons\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
        view();
    }

    public function doDemo()
    {
        Model('ApiLog')->sniffer();


        D(req());
        echo \Grace\Req\Uri::getInstance()->getar();
        headers();
        echo 'test测试';

    }

    public function doLogin()
    {

    }

}
