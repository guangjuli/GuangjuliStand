<?php
namespace App\Controller;


class User extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        view();
    }


}