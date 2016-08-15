<?php
namespace App\Controller;


class Welcome extends BaseController {
//    use \App\Traits\View;

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        D(req());

        model('form')->run();
exit;
        View();
    }

}
