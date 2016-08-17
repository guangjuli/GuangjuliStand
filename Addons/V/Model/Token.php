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
            'Model::User',
            'Model::Gate'
        ];
    }
    //获取token表信息
    public function getTokenInfo($accessToken)
    {
        $check = $this->getTokenInfoFromSql($accessToken);
        $info = $check?$check:[];
        return $info;
    }
    //获取通行证accessToken
    public function accessToken()
    {
        //生成token
        $this->token();
        //更新，添加操作
        $checkInsertToken=$this->isExistTokenByUserId(bus('token')['userId'])?$this->updateToken():$this->addToken();
        if($checkInsertToken){
            return [
            'token'     =>bus('token')['token'],
            'expires'   =>$this->expires,
            ];
        }else{
            return [];
        }
    }

    //在获取token前对请求参数进行验证
    public function validateTokenReq($req)
    {
        //校验参数是否为空
        $validate = ['verify','login','time','deviceId','type'];
        if(!model('Gate')->isExistParams($validate,$req))return false;
        if(!model('Gate')->isEmpty($req))return false;
        //校验密匙verify
        $this->verify($req);
        //校验login对应的用户是否存在
        $user = model('User')->getUserByLogin($req['login']);
        if(empty($user))return false;
        $type = strtolower($req['type'])=='android'?'android':'ios';
        bus(['token'=>[
            'userId'=> $user['userId'],
            'login'=> $req['login'],
            'type'=> $type
            ]
        ]);
        return true;
    }
    // 判断token有效性
    public function isEnableToken($token)
    {
        $tokenInfo = $this->getTokenInfoFromSql($token);
        if(empty($tokenInfo))return false;
        $enableTime = intval($tokenInfo['createAt'])+$this->expires;
        if($enableTime<time())return false;
        return true;
    }

    //数据库操作
    private function getTokenInfoFromSql($accessToken)
    {
        $tokenInfo = server('Db')->getRow("select * from token where `accessToken`='$accessToken'");
        $tokenInfo = $tokenInfo?$tokenInfo:[];
        return $tokenInfo;
    }

    private function isExistTokenByUserId($userId)
    {
        $userId = intval($userId);
        $tokenId = server('Db')->getOne("select tokenId from token where `userId` = $userId");
        $check = $tokenId?true:false;
        return $check;
    }

    private function updateToken()
    {
        $res['login']       = bus('token')['login'];
        $res['accessToken'] = bus('token')['token'];
        $res['type']        = bus('token')['type'];
        $res['createAt']    = time();
        $insert = server('Db')->autoExecute('token', $res, 'UPDATE', '`userId`='.bus('token')['userId']);
        $check = $insert?true:false;
        return $check;
    }

    private function addToken()
    {
        $res['login']       = bus('token')['login'];
        $res['userId']      = bus('token')['userId'];
        $res['accessToken'] = bus('token')['token'];
        $res['type']        = bus('token')['type'];
        $res['createAt']    = time();
        $insert = server('Db')->autoExecute('token', $res, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    //TODO:算法待修改，一个用户可能有多台设备，设备编号不唯一，加入deviceId，同一用户token不唯一
    private function token()
    {
        $param = bus('token');
        $token = md5($param['login'] . '_' . microtime(true) . '_' . rand(100000000, 999999999));
        bus(['token'=>[
            'userId'=> $param['userId'],
            'login'=> $param['login'],
            'type'=>$param['type'],
            'token'=> $token
        ]
        ]);
    }

    private function verify($req)
    {
        $verify = $req['verify'];
        $deviceId = $req['deviceId'];
        $login = $req['login'];
        $time = $req['time'];
        //TODO: 校验设备编号正确性
        if ($verify != MD5($deviceId . $this->clientSecret . $login . $time))return [];
    }



}