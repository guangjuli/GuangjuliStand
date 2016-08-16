<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {

        //Model('page')->pageLogin();         //登录界面
        //Model('page')->page404();         //404界面
        Model('page')->page500();         //500界面

        exit;

    }

}
