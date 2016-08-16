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
    }

    //实现接口方法
    public function depend()
    {
        return [
            'Server::Db',
            'Model::User'
        ];
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
                'expires'   =>$this->expires,
            ];
        }else{
            return [];
        }

    }

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

}