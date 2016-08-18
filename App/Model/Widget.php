<?php

namespace App\Model;

class Widget implements \Grace\Base\ModelInterface
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
        ];
    }

    /**
     * 后台顶部菜单
     * @return mixed
     */
    public function adminNav()
    {
        $tpl = '../Widget/adminNav';
        $html = fetch($tpl,[
            'menuhead' => Model('menu')->menuMain(),          //所有
        ]);
        //D(Model('menu')->menuMain());
        return $html;
    }


    /**
     * 左侧菜单
     * @return mixed
     */
    public function adminNavLeft()
    {
        $tpl = '../Widget/adminNavLeft';
        $html = fetch($tpl,[
            'menuleft' => Model('menu')->menuMainsub(),          //所有
        ]);
        //D(Model('menu')->menuMainsub());
        return $html;
    }

    /**
     * footer
     * @return mixed
     */
    public function adminFooter()
    {
        $tpl = '../Widget/adminFooter';
        $html = fetch($tpl,[
        ]);
        return $html;
    }


}
