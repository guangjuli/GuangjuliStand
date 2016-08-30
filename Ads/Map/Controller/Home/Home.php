<?php
namespace Ads\Map\Controller\Home;

class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex(){
    }

    public function doDet(){
        return '模块线路图';
    }


}
