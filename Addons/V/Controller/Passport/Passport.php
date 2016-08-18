<?php

namespace Addons\Controller;
use Addons\Traits\AjaxReturn;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 16:27
 */
class Passport
{
    use AjaxReturn;

    public function doRegisterPost()
    {
        $req = req('Post');
        $register = model('Passport');
        $code = $register->validateRegisterReq($req);
        $msg  = $register->registerConfig()['returnNews'];
        if($code==200){
            if(model('Passport')->register()){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg' => $msg[$code],
                ]);
            }else{
                $this->AjaxReturn([
                    'code' => -200,
                    'msg' => $msg[-200],
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg[$code],
            ]);
        }
    }

    public function doIndex()
    {
        $verify = md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff1121471276800');
        view('',[
            'verify'=> $verify
        ]);
    }

}