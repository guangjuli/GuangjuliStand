<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 10:54
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Gate implements ModelInterface
{
    public function depend()
    {
        return[
          'Model::Token',
        ];
    }

    //凡是token必须的接口都要接受token检验后才能调用相应的方法
    public function verifyToken($token)
    {
       $tokenInfo =model('Token')->isEnableToken($token);
       if($tokenInfo){
           if(!server('Cache')->has($token)){
               server('Cache')->set($token,$tokenInfo);
           }
       }else{
           $res['code']=-500;
           $res['msg'] = 'token is not in a valid';
           $res['data']='';
           echo json_encode($res);
           exit;
       }
    }


}