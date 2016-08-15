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
        /*
         * 1 : йсм╪
         */
        server('Cache')->set('key', 'myKeyValue', 3600);
        echo server('Cache')->get('key');
exit;

        View();



        exit;

    }

}
