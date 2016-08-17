<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        $config = Model('Config')->config('AdminAuth');
        D($config);
        exit;
    }

    public function doLogin()
    {

    }

}
