<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 10:54
 */

namespace Addons\Model;


class Gate
{
    //凡是token必须的接口都要接受token检验后才能调用相应的方法
    public function verifyToken($token)
    {
       $tokenInfo =model('Token')->isEnableToken($token);
       if($tokenInfo){
           server('Cache')->set($token,$tokenInfo);
       }else{
           $res['code']=-500;
           $res['msg'] = 'token is not in a valid';
           $res['data']='';
           echo json_encode($res);
           exit;
       }
    }


}