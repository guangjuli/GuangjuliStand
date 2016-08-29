<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 10:18
 */

namespace Addons\Model;


use Addons\Traits\AjaxReturn;
use Grace\Base\ModelInterface;

class Token implements ModelInterface
{
    use AjaxReturn;

    private $config=array();
    private $clientSecret='';
    private $expires='';
    public function __construct()
    {
        $this->config = server()->Config('V')['token'];
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
     * @param string $accessToken
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
     * @param array $req
     * @return array
     */
    public function accessToken($req)
    {
        //生成token   包括验证
        if(!$this->token($req))return [];
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
     * 判断token有效性
     * @param string $token
     * @return array
     * 如果有效返回tokenInfo否则返回[]
     */
    public function isEnableToken($token)
    {
        if(!$token)return [];
        $tokenInfo = $this->getTokenInfoFromSql($token);
        if(empty($tokenInfo))return [];
        $enableTime = intval($tokenInfo['createAt'])+intval($tokenInfo['expireIn']);
        if($enableTime<time())return [];
        return $tokenInfo;
    }

    /**
     * 从数据库获取token信息
     * @param string $accessToken
     * @return array
     */
    private function getTokenInfoFromSql($accessToken)
    {
        $tokenInfo = server('Db')->getRow("select * from token where `accessToken`='$accessToken'");
        return  $tokenInfo?$tokenInfo:[];
    }

    /**
     * 根据userId判断token是否存在
     * @param int $userId
     * @return boolean
     */
    private function isExistTokenByUserId($userId)
    {
        $userId = intval($userId);
        $tokenId = server('Db')->getOne("select tokenId from token where `userId` = $userId");
        return $tokenId?true:false;
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
        $res['expireIn']    = intval($this->expires);
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
        $res['expireIn']    = intval($this->expires);
        $insert = server('Db')->autoExecute('token', $res, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    /**
     * 生成token
     * @param array $req
     * @return boolean
     */
    //TODO:算法待修改，一个用户可能有多台设备，设备编号不唯一，加入deviceId，同一用户token不唯一,计算token修改
    private function token($req)
    {
        //验证verify是够正确
        if(!$this->verify($req)) return false;
        //验证用户是否存在
        $user = model('User')->getUserByLogin($req['login']);
        if(empty($user))return false;
        //生成token
        $token = md5($req['login'] . '_' . microtime(true) . '_' . rand(100000000, 999999999));
        //通过bus传递参数
        $req['type'] = strtolower($req['type'])=='android'?'android':'ios';
        bus(['token'=>[
            'userId'=> $user['userId'],
            'login'=> $req['login'],
            'type'=>$req['type'],      //android或ios
            'token'=> $token
        ]
        ]);
        return true;
    }

    /**
     * 校验verify是否正确
     * @param array $req
     * $req中包含键名 'verigy','deviceId','login'or'phone','time'
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


    /**
     * 校验token有效性
     * @param string $token
     */
    public function verifyToken($token)
    {
        $tokenInfo =$this->isEnableToken($token);
        if($tokenInfo){
            bus([
                'tokenInfo'=>$tokenInfo
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-500,
                'msg'=>'token is not in a valid'
            ]);
        }
    }



}