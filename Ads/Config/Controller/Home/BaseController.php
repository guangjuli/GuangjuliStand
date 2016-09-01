<?php

namespace Ads\Config\Controller\Home;

//hook
class BaseController{

    public function __construct(){
    }

    /**
     * @return array
     * 返回可以调用的api
     */
    public function doApi(){
        return [
            'data/menu/MenuLevelThree',
            'data/menu/MenuTop',
            'data/menu/Menu',
            'data/menu/MenuSec',
            'data/menu/List',
            'data/menu/TopId',
            'data/menu/MenuId',
            'data/menu/ParendId',
        ];
    }

    /**
     * @return array
     * 返回依赖关系
     */
    public function doDepend()
    {
        return [
        ];
    }

    public function doDependTable()
    {
        return [
            'Menu'
        ];
    }

}
