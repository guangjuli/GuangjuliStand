<?php
namespace Addons\Controller;

class Home extends BaseController {


    public function __construct(){
        parent::__construct();
    }

    public function doIndex_ex()
    {
        Model('scan')->Run();
    }


    public function doIndex()
    {
        echo 123;
        view('',['name'=>"irones"]);
    }

}
