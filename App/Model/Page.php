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
        $tpl = '../Error/Error404';
        view($tpl);
        exit;

    }

    /**
     * 500页面
     */
    public function page500()
    {
        $tpl = '../Error/Error500';
        view($tpl);
        exit;
    }

    /**
     * 登录界面
     */
    public function pageLogin()
    {
        //$tpl = server()->Config('Config')['App']['ErrorPage404'];
        $tpl = '../Error/ErrorLogin';
        view($tpl);
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


