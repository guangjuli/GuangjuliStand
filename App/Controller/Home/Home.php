<?php
namespace App\Controller;


class Home extends BaseController {
    use \App\Traits\View;

    public function __construct(){
        parent::__construct();
    }

//    public function doIndex_ex()
//    {
//        echo 'ex';
//    }

    public function doIndex()
    {


//       echo Model('Gate')->isAddons();

       // Model('page')->page404();         //登录界面
      //  Model('page')->pageLogin();         //登录界面
        Model('page')->pageLogin();         //登录界面

        exit;

    }

}
