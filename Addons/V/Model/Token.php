<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 10:18
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Token implements ModelInterface
{
    private $array=array();
    private $clientSecret='';
    private $expires='';

    public function __construct()
    {
        $this->array = server()->Config('Config')['token'];
        $this->clientSecret = $this->array['clientSecret'];
        $this->expires = $this->array['expires'];
    }

    //实现接口方法
    public function depend()
    {
        return [
            'Server::Db',
            'Model::User',
            'Model::Device'
        ];
    }
    //数据库操作
    private function addToken(Array $array)
    {
        $insert = server('Db')->autoExecute('token', $array, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }
    private function deleteToken($where)
    {
       $delete = server('Db')->query("delete from token where $where");
       $check = $delete?true:false;
       return $check;
    }
    private function getTokenInfo($accessToken)
    {
        $tokenInfo = server('Db')->getRow("select * from token where `accessToken`=$accessToken");
        $tokenInfo = $tokenInfo?$tokenInfo:[];
        return $tokenInfo;
    }
    //获取token表信息
    public function getToken($accessToken)
    {
        $check = $this->getTokenInfo($accessToken);
        $info = $check?$check:[];
        return $info;
    }
    //获取通行证accessToken
    public function accessToken($req)
    {
        if(!$req)return [];
        $deviceId   = $req['deviceId'];
        $login      = $req['login'];
        $time       = $req['time'];
        $verify     = $req['verify'];
        if(!$deviceId&&!$time&&!$verify)return [];
        if($login){
          $userId=model('General')->getById('user',['userId'],"`login`='$login'");
          $userId = $userId['userId'];
          if(!$userId)return [];
        }else{
           $userId = model('General')->getById('device',['userId'],"`device`='$deviceId'");
           $userId = $userId['userId'];
           if(!$userId){
               model('General')->insert(['createAt'=>time()],'user');
               $userId = server('Db')->insert_id();
               $checkDeviceId = model('General')->insert(['userId'=>$userId,'deviceId'=>$deviceId],'device');
               if(!$checkDeviceId)return [];
           }
        }
        $md5 = MD5($deviceId . $this->clientSecret . $login . $time);
        if ($verify != $md5) {
            //校验不通过
            return [];
        }
        //删除token
        $this->deleteToken("`deviceId`='$deviceId'");
        $this->deleteToken("`login`='$login'");
        //添加token
        $token = md5($deviceId . $login . '_' . microtime(true) . '_' . rand(100000000, 999999999));
        $res['login']       = $login;
        $res['userId']      = $userId;
        $res['deviceId']    = $deviceId;
        $res['accessToken'] = $token;
        $res['createAt']    = time();
        $res['expires_in']  = 2592000;
        $checkInsertToken = $this->addToken($res);
        if($checkInsertToken){
            return [
                'token'     =>$token,
                'expires'   =>$this->expires,
            ];
        }else{
            return [];
        }

    }

}