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
        $res = Model('AdminAuth')->auth($password);
        return $res;
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
