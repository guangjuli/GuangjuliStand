<?php
namespace App\Controller;


class Demo extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        view();
    }

}
