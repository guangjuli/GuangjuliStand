<?php
namespace App\Controller;


class Login extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        Model('page')->pageLogin();         //登录界面
        exit;
    }



}
