<?php

namespace Addons\Controller;
use Addons\Traits\AjaxReturn;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 10:16
 */
class Token
{
    use AjaxReturn;

    public function doAccesstokenPost()
    {
        $token = model('Token')->accessToken(req('Post'));
<<<<<<< HEAD
        if(empty($token)){
            $this->AjaxReturn([
                'code' => -200,
                'msg' => '获取失败',
                'data' =>""
            ]);
        }else{
=======
        if (empty($token)) {
            $this->AjaxReturn([
                'code' => -200,
                'msg' => '获取失败',
                'data' => ""
            ]);
        } else {
>>>>>>> refs/remotes/origin/master
            $this->AjaxReturn([
                'data' => $token
            ]);
        }
    }

<<<<<<< HEAD
    public function doIndex()
    {
        view('',[
            'verify'=>MD5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff1471276800')
        ]);
    }

=======
>>>>>>> refs/remotes/origin/master
}