<?php
namespace App\Controller;


class Demo extends BaseController {

    use \App\Traits\View;

    public function __construct(){
        parent::__construct();
    }


    public function doIndex_ex()
    {
        echo '/demo/index/ex';
        echo "<pre>";
        print_r("
/ds/index
/ds/index/ex
/ds/view
/ds/smarty
        ");
        echo "</pre>";
    }

    public function doIndex()
    {
//        D(req());
//        echo '/demo/index';
//        echo "<pre>";
//        print_r("
///ds/index
///ds/index/ex
///ds/view
///ds/smarty
//        ");
//        echo "</pre>";
        view();
    }


}
