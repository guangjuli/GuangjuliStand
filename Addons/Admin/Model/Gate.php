<?php

namespace Addons\Model;

class Gate implements \Grace\Base\ModelInterface
{

    /**
     * todo application覆盖
     * Gate constructor.
     */
    public function __construct()
    {
    }


    /**
     * 返回依赖关系
     * @return array
     */
    public function depend()
    {
        return [
            'Model::RouterAdd',
            'Model::AdminAuth',

        ];
    }



    /**
     * AdminAuth 是否已经登录
     * @return mixed
     */
    public function AdminAuth_isLogin()
    {
        return Application('AdminAuth')->isLogin();
    }

    /**
     * 是否已经登录
     * //todo
     * @return bool
     */
    public function isLogin()
    {
        return true;
    }

    /**
     * 是否管理员
     * //todo
     * @return bool
     */
    public function isAdmin()
    {
        return true;
    }

    
    /**
    |----------------------------------------------------------------
    | over
    |----------------------------------------------------------------
     */


    /**
     * 是否hmvc模式
     * @return mixed
     */
    public function isAddons()
    {
        return Model('RouterAdd')->isAddons();      //是否addons
    }



}


