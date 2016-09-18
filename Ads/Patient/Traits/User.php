<?php
namespace Ads\Patient\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:39
 * ajax返回部件
 */
trait User{
    //外部Api
    //判断用户信息表user_info对应的id是否存在
    public function isExistUserInfoById($id)
    {
        $id = intval($id);
        $id = server('Db')->getOne("select `userId` from user_info where `userId`=$id");
        return $id?true:false;
    }

    public function isExistUserById($id)
    {
        $id = intval($id);
        $id = server('Db')->getOne("select `userId` from user where `userId`=$id");
        return $id?true:false;
    }

    public function getUserImage($id)
    {
        $id = intval($id);
        $image = server('Db')->getOne("select `gravatar` from user_info where `userId`=$id");
        return $image?:'';
    }
}