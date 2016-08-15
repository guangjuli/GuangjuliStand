<?php
namespace App\Controller;


class Demo extends BaseController {
    use \App\Traits\View;

    public function __construct(){
        parent::__construct();
    }

    /**
     * 注意下面是调用的同一个
     */
    public function doViewq()
    {
        $this->view();
    }

    public function doViewq_ex()
    {
        $this->view();
    }



}
