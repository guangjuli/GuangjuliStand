<?php

namespace App\Model;

class Page implements \Grace\Base\ModelInterface
{
    public function __construct()
    {
    }

    /**
     * 404页面
     */
    public function page404()
    {
        exit;

    }

    /**
     * 500页面
     */
    public function page500()
    {

        exit;
    }

    /**
     * 登录界面
     */
    public function pageLogin()
    {
$res =         server()->Config('Config')['App']['ErrorPage404'];
        D($res);

        view('../Common/login');
        exit;
    }

    /**
     * 返回依赖关系
     * @return array
     */
    public function depend()
    {
        return [
        ];
    }


}


