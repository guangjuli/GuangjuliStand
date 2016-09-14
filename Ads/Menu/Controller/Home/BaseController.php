<?php

namespace Ads\Menu\Controller\Home;


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
