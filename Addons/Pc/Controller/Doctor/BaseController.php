<?php

namespace Addons\Controller;


//hook
class BaseController{

    public function __construct(){
        file_get_contents('php://input', 'r');
        $req = json_decode(req('Post'));
        model('Gate')->verifyToken($req['token']);
    }
}
