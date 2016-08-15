<?php
namespace App\Controller;


class Demo extends BaseController {
    use \App\Traits\View;

    public function __construct(){
        parent::__construct();
    }

    public function doView()
    {
        view();
    }

    public function doView_ex()
    {
        view();
    }



}
