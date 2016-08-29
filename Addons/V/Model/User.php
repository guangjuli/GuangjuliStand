<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-16
 * Time: 16:47
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class User implements ModelInterface
{
    public function depend()
    {
        // TODO: Implement depend() method.
        return[
            'Model::Token',
            'Model::Validate',
            'Server::Db',
            'Model::Upload'
        ];
    }

    /**
     * getUserByLogin
     * 根据login获取用户信息
     * @param string $login
     * @return array
     */
    public function getUserByLogin($login)
    {
        $user = server('Db')->getRow("select * from user where login = '$login'");
        $user = $user?$user:[];
        return $user;
    }
    /**
     * 判断用户是否存在
     * @param string $login
     * @return boolean
     */
    public function isExistUserByLogin($login)
    {
        $user = $this->getUserByLogin($login);
        $check = empty($user)?false:true;
        return $check;
    }

    /**
     * 插入用户
     * @param array $array
     * @return boolean
     */
    public function insertUser(Array $array)
    {
        $insert = server('Db')->autoExecute('user', $array, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    /**
     * 插入用户返回id
     * @param array $array
     * @return int
     */
    public function insertUserReturnId(Array $array)
    {
        $userId = null;
        $insert = server('Db')->autoExecute('user', $array, 'INSERT');
        if($insert)$userId = server('Db')->insert_id();
        return $userId;
    }

    /**
     * 插入用户返回id
     * @param array $array
     * @param int $userId
     * @return boolean
     */
    public function updateUserByUserId(Array $array,$userId=null)
    {
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        //TODO: 为获取到userId错误提示
        if(!$userId) return false;
        $insert = server('Db')->autoExecute('user', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function paramsConfig()
    {
        return[
            //必填参数
            'field' => ['trueName','gender','birthday'],
            //参数为string类型
            'string' => ['trueName','birthday'],
            //参数为int类型
            'int' => ['gender'],
            'returnNews'=>[
                200 =>'succeed',
                -201 => '必填参数不能为空',
                -202 => '存在格式不正确数据',
                -200 => '系统异常'
            ]
        ];
    }

    /**
     * 校验用户请求
     * @param array $req
     * @return int
     */
    public function validateUserReq($req)
    {
        $req['gender']=intval($req['gender']);
        $config = $this->paramsConfig();
        if(!model('Validate')->validateParams($config['field'],$req)) return -201;
        $paramsType = model('Validate')->validateParamsType($req,$config['string'],$config['int']);
        if(!empty($paramsType)) return -202;
        return 200;
    }

    //TODO:待指定详细返回值
    /**
     * 依据token获取用户信息
     * @return array
     */
    public function getUserInfoByToken()
    {
        $filed=['trueName','login','gravatar','gender','birthday','height'];
        $filed = implode(',',$filed);
        $userId = bus('tokenInfo')['userId'];
        $userInfo = server('Db')->getRow("select $filed from user where userId = $userId");
        return $userInfo?$userInfo:[];
    }

    /**
     * 根据userId获取用户信息
     * @return array
     */
    public function getUserInfoByUserId($userId=null)
    {
        $userId = $userId?$userId:bus('tokenInfo')['userId'];
        $userInfo = server('Db')->getRow("select * from user where userId = $userId");
        return $userInfo?$userInfo:[];
    }

    /**
     * 上传图片
     * @param $file
     * @return int
     */
    public function uploadHeadImage($file)
    {
        $config = server()->Config('V')['uploadHeadImage'];
        $code=model('Upload',$config)->upload($file);
        return $code;
    }

    public function saveImagePathToDb()
    {
        $path = model('Upload')->uploadPath();
        return $this->updateUserByUserId(['gravatar'=>$path])?true:false;
    }

}