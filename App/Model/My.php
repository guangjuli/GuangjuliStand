<?php

namespace App\Model;

class My implements \Grace\Base\ModelInterface
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


}
