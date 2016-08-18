<?php
namespace App\Controller;


class Help extends BaseController {

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

}
