<?php
namespace App\Controller;


class Demo extends BaseController {
    use \App\Traits\View;

    public function __construct(){
        parent::__construct();
    }

    /**
     * ע�������ǵ��õ�ͬһ��
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
