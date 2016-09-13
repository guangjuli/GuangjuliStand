<?php

namespace Addons\Controller;


//hook
class BaseController{

    public function __construct(){
        model('Gate')->verifyToken(req('Post')['token']);
    }
}
