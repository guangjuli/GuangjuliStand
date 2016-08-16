<?php

namespace App\Model;

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
     * 是否admin
     * @return bool
     */
    public function isAdmin()
    {
        //todo
        return true;
    }

    /**
     * 是否登录
     * @return bool
     */
    public function isLogin()
    {
        //todo
        return true;
    }

    /**
     |----------------------------------------------------------------
     | pre
     * todo
     * 需要检查是否有遗漏
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

    /**
     * //todo   检查和更新
     * 返回依赖关系
     * @return array
     */
    public function depend()
    {
        return [
            'Model::RouterAdd'
        ];
    }


}


