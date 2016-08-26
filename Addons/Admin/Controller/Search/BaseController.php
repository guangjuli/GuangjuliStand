<?php

namespace Addons\Controller;


//hook
class BaseController{

    public function __construct(){
    }


    public function doIndex()
    {
        view();
    }

}
