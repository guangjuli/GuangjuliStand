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
<<<<<<< HEAD
    private $array=array();
    private $clientSecret='';
    private $expires='';

    public function __construct()
    {
        $this->array = server()->Config('Config')['token'];
        $this->clientSecret = $this->array['clientSecret'];
        $this->expires = $this->array['expires'];
=======
    private $config=array();
    private $clientSecret='';
    private $expires='';
    private $deviceId='';
    private $login = '';
    private $token ='';
    private $userId = '';

    public function __construct()
    {
        $this->config = server()->Config('Config')['token'];
        $this->clientSecret = $this->config['clientSecret'];
        $this->expires = $this->config['expires'];
>>>>>>> refs/remotes/origin/master
    }

    //实现接口方法
    public function depend()
    {
        return [
            'Server::Db',
<<<<<<< HEAD
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
=======
            'Model::User'
        ];
    }
>>>>>>> refs/remotes/origin/master
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
<<<<<<< HEAD
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
=======
        $this->checkReq($req);
        $login = $this->login;
        $user = model('User')->getUserByLogin($login);
        $userId = $user['userId'];
        $this->userId = $userId;
        if(!$userId)return [];
        //删除原token
        $this->deleteTokenByUserId($userId);
        //生成token
        $this->token();
        //添加token
        $checkInsertToken = $this->addToken();
        if($checkInsertToken){
            return [
                'token'     =>$this->token,
>>>>>>> refs/remotes/origin/master
                'expires'   =>$this->expires,
            ];
        }else{
            return [];
        }

    }

<<<<<<< HEAD
=======
    //数据库操作

    private function deleteTokenByUserId($userId)
    {
        $userId = intval($userId);
        $delete = server('Db')->query("delete from token where `userId`=$userId");
        $check = $delete?true:false;
        return $check;
    }
    private function getTokenInfo($accessToken)
    {
        $tokenInfo = server('Db')->getRow("select * from token where `accessToken`='$accessToken'");
        $tokenInfo = $tokenInfo?$tokenInfo:[];
        return $tokenInfo;
    }

    private function addToken()
    {
        $res['login']       = $this->login;
        $res['userId']      = $this->userId;
        $res['deviceId']    = $this->deviceId;
        $res['accessToken'] = $this->token;
        $res['createAt']    = time();
        $res['expires_in']  = 2592000;
        $insert = server('Db')->autoExecute('token', $res, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    private function checkReq($req)
    {
        if(!$req)return [];
        $deviceId   = $req['deviceId'];
        $login      = $req['login'];
        $time       = $req['time'];
        $verify     = $req['verify'];
        if(!$deviceId&&!$login&&!$time&&!$verify)return [];
        if(!(is_string($deviceId)&&is_string($login)&&is_string($time)&&is_string($verify)))return[];
        if ($verify != MD5($deviceId . $this->clientSecret . $login . $time))return [];
        $this->deviceId = $deviceId;
        $this->login = $login;
    }

    private function token()
    {
        $this->token = md5($this->deviceId . $this->login . '_' . microtime(true) . '_' . rand(100000000, 999999999));
    }

>>>>>>> refs/remotes/origin/master
}