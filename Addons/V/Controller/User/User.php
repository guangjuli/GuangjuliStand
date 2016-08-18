<?php

namespace Addons\Controller;
use Addons\Traits\AjaxReturn;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-18
 * Time: 11:59
 */
class User
{
    use AjaxReturn;

    public function doUserinfosubmitPost()
    {
        $req = req('Post');
        $user = model('User');
        $msg = $user->paramsConfig()['returnNews'];
        $code = $user->validateUserReq($req);
        if($code==200){
            $check = $user->updateUserByUserId($req);
            if($check){
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

}