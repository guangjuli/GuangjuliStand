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

    /**
     * 获取token表信息
     * @param $accessToken
     * @return array
     */
    public function getTokenInfo($accessToken)
    {
        $check = $this->getTokenInfoFromSql($accessToken);
        $info = $check?$check:[];
        return $info;
    }

    /**
     * 获取通行证accessToken
     * @return array
     */
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

    /**
     * 在获取token前对请求参数进行验证
     * @return boolean
     */
    public function validateTokenReq(Array $req)
    {
        //校验参数是否为空
        $validate = ['verify','login','time','deviceId','type'];
        if(!model('Validate')->validateParams($validate,$req))return false;
        //校验密匙verify
        if(!$this->verify($req)) return false;
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

    /**
     * 判断token有效性
     * @param $token
     * @return array
     */
    public function isEnableToken($token)
    {
        if(!$token)return [];
        $tokenInfo = $this->getTokenInfoFromSql($token);
        if(empty($tokenInfo))return [];
        $enableTime = intval($tokenInfo['createAt'])+intval($this->expires);
        if($enableTime<time())return [];
        return $tokenInfo;
    }

    /**
     * 从数据库获取token信息
     * @param $accessToken
     * @return array
     */
    private function getTokenInfoFromSql($accessToken)
    {
        $tokenInfo = server('Db')->getRow("select * from token where `accessToken`='$accessToken'");
        $tokenInfo = $tokenInfo?$tokenInfo:[];
        return $tokenInfo;
    }

    /**
     * 根据userId判断token是否存在
     * @param $userId
     * @return boolean
     */
    private function isExistTokenByUserId($userId)
    {
        $userId = intval($userId);
        $tokenId = server('Db')->getOne("select tokenId from token where `userId` = $userId");
        $check = $tokenId?true:false;
        return $check;
    }

    /**
     * 更新token
     * @return boolean
     */
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

    /**
     * 添加token
     * @return boolean
     */
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

    /**
     * 生成token
     */
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

    /**
     * 校验verify是否正确
     * @param array $req
     * @return boolean
     */
    public function verify($req)
    {
        $verify = $req['verify'];
        $deviceId = $req['deviceId'];
        $login = $req['login']?:$req['phone'];
        $time = $req['time'];
        //TODO: 校验设备编号正确性
        if ($verify != MD5($deviceId . $this->clientSecret . $login . $time))return false;
        return true;
    }



}