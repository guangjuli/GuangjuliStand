<?php
namespace Ads\Data\Controller\Define;

class Define {

    /**
     * @return string
     * 后台主界面的根地址
     */
    public function doAdminBase(){
        return "http://gst.so/man/";
    }

    public function doAdminloginUrlPost(){
        return "http://gst.so/man/login/";
    }

    /**
     * @return string
     * 后台登录地址
     */
    public function doAdminloginUrl(){
        return "http://gst.so/man/login/";
    }

    /**
     * @return string
     * 登出地址
     */
    public function doAdminlogoutUrl(){
        return "http://gst.so/man/logout/";
    }

    /**
     * @return string
     * 后台访问住地址
     */
    public function doAdminMainUrl(){
        return "http://gst.so/man/";
    }




}
