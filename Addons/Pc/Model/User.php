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
        if(!is_string($login))return [];
        $user = server('Db')->getRow("select * from user where login = '$login'");
        return $user?:[];
    }
    /**
     * 判断用户是否存在
     * @param string $login
     * @return boolean
     */

    public function isExistUserByLogin($login)
    {
        $user = $this->getUserByLogin($login);
        return empty($user)?false:true;
    }

    /**
     * 插入用户
     * @param array $array
     * @return boolean
     */
    public function insertUser(Array $array)
    {
        $insert = server('Db')->autoExecute('user', $array, 'INSERT');
        return $insert?true:false;
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
     * 根据userId删除用户
     * @param int $userId
     * @return boolean
     */
    public function deleteUserByUserId($userId)
    {
        $userId = intval($userId);
        $check=server('Db')->query("delete from user where `userId`=$userId");
        return $check?true:false;
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
            'field' => ['nickName','gender','birthday'],
            //参数为string类型
            'string' => ['nickName','birthday'],
            //参数为int类型
            'int' => ['gender'],
            'returnNews'=>[
                200 =>'succeed',
                -201 => '必填参数不能为空',
                -202 => '存在格式不正确数据',
            ]
        ];
    }

    /**
     * 校验用户请求
     * @param array $req
     * @return int
     */
    public function validateUserReq(Array $req)
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
     * @param int $userId
     * @return array
     */
    public function getUserInfoByToken($userId=null)
    {
        $filed=['trueName','login','gravatar','gender','birthday','height'];
        $filed = implode(',',$filed);
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        $userInfo = server('Db')->getRow("select $filed from user u,user_info ui where u.userId = $userId");
        return $userInfo?:[];
    }

    /**
     * 根据userId获取用户信息
     * @param $userId
     * @return array
     */
    public function getUserInfoByUserId($userId=null)
    {   //参数设置
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        if(empty($userId)) return [];
        //执行sql
        $userInfo = server('Db')->getRow("select * from user where userId = $userId");
        return $userInfo?:[];
    }

    /**
     * 判断用户是否存在
     * @param int $userId
     * @return boolean
     */
    public function isExistUserByUserId($userId)
    {
        $user = $this->getUserInfoByUserId($userId);
        return empty($user)?false:true;
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
        return model('Userinfo')->updateUserInfo(['gravatar'=>$path]);
    }

}