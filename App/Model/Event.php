<?php

namespace App\Model;

class Event implements \Grace\Base\ModelInterface
{
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
            "Model::AdminAuth"
        ];
    }



    /**
     * |------------------------------------------------------------
     * | AdminAuth 动作
     * |------------------------------------------------------------
     */

    /**
     * @param string $password
     *
     * @return mixed
     */
    public function AdminAuth_auth($password = ''){
        return Model('AdminAuth')->auth($password);
    }

    /**
     * adminauth logout
     */
    public function AdminAuth_Logout($url = ''){
        Model('AdminAuth')->logout($url);
    }
    /**
     * |------------------------------------------------------------
     * | AdminAuth 动作
     * |------------------------------------------------------------
     */



}
