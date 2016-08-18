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
        $msg  = $register->config['returnNews'];
        if($code==200){
            if(model('Passport')->register()){
                $this->AjaxReturn([
                    'code' => $code,
                    'msg' => $msg[$code],
                ]);
            }else{
                $this->AjaxReturn([
                    'code' => -201,
                    'msg' => '系统异常',
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code' => $code,
                'msg' => $msg[$code],
            ]);
        }
    }

}