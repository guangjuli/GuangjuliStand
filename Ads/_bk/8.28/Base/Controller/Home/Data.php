<?php
namespace Ads\Base\Controller\Home;


class Data extends BaseController {

    public function __construct(){
        parent::__construct();
    }


    /**
     * @return string
     * 后台访问根路径
     */
    public function doRootpath()
    {
        return "http://gst.so/";
    }

}
