<?php
namespace App\Addons;


class Welcome extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {

        echo $this->Model('cache')->run(1,2,3);
exit;
        return $this->fetch('');
    }

}
