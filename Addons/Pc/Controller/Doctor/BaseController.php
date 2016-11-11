<?php

namespace Addons\Controller;


//hook
class BaseController{

    public function __construct(){
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        model('Gate')->verifyToken($req['token']);
    }
}
