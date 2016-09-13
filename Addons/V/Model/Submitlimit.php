<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-09
 * Time: 17:01
 */

namespace Addons\Model;


class Submitlimit
{
    public function submit($req)
    {
        $userId = $req['userId']?:bus('tokenInfo')['userId'];
        $random = $req['tag'];
        server('Cache')->set();
    }
}