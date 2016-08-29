<?php
namespace Ads\Base\Controller\Home;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function doIndex()
    {
        return 123;
    }

    public function doDemo()
    {
        Model('ApiLog')->sniffer();


        D(req());
        echo \Grace\Req\Uri::getInstance()->getar();
        headers();
        echo 'test测试';

    }

    public function doRootpath()
    {
        return "http://gst.so/";
    }

}
