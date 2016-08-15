<?php
namespace App\Controller;


class Demo extends BaseController {

    use \App\Traits\View;

    use \App\Traits\Model;

    public function __construct(){
        parent::__construct();
    }

    public function doModel()
    {
        $this->Model('form')->run();
    }


}
