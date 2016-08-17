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
        $check = $this->getTokenInfoFromSql($accessToken);$info = $check?$check:[];
        return $info;
    }
    //获取通行证accessToken
    public function accessToken($req)
    {
        //删除原token
        $this->deleteTokenByUserId(bus('userId'));
        //生成token
        $this->token();
        //添加token
        $checkInsertToken = $this->addToken();
        if($checkInsertToken){
            return [
            'token'     =>bus('token'),
            'expires'   =>$this->expires,
            ];
        }else{
            return [];
        }
    }

    public function validateTokenReq($req)
    {
        //校验参数是否为空
        $validate = ['verify','login','time','deviceId'];
        if(!model('Gate')->isExistParams($validate,$req))return false;
        if(!model('Gate')->isEmpty($req))return false;
        //校验secrect密匙verify
        $this->verify($req);
        //校验login对应的用户是否存在
        $user = model('User')->getUserByLogin($req['login']);
        if(empty($user))return false;
        bus([
            'userId'=> $user['userId'],
            'login'=> $req['login']
        ]);
        return true;
    }

    //数据库操作

    private function deleteTokenByUserId($userId)
    {
        $userId = intval($userId);
        $delete = server('Db')->query("delete from token where `userId`=$userId");
        $check = $delete?true:false;
        return $check;
    }
    private function getTokenInfoFromSql($accessToken)
    {
        $tokenInfo = server('Db')->getRow("select * from token where `accessToken`='$accessToken'");
        $tokenInfo = $tokenInfo?$tokenInfo:[];
        return $tokenInfo;
    }

    private function addToken()
    {
        $res['login']       = bus('login');
        $res['userId']      = bus('userId');
        $res['accessToken'] = bus('token');
        $res['createAt']    = time();
        $res['expires_in']  = 2592000;
        $insert = server('Db')->autoExecute('token', $res, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    //TODO:算法待修改，一个用户可能有多台设备，设备编号不唯一，加入deviceId，同一用户token不唯一
    private function token()
    {
        $token = md5(bus('login') . '_' . microtime(true) . '_' . rand(100000000, 999999999));
        bus([
           'token'=>$token
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