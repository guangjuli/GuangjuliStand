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

    public function adminNav()
    {
        $tpl = '../Widget/adminNav';
        $html = fetch($tpl);
        return $html;
    }



}
