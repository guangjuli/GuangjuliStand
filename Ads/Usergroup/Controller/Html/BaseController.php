<?php

namespace Ads\Usergroup\Controller\Html;

//hook
class BaseController{

    public function __construct(){
    }

    public function doIndex(){
    }

    public function doIndexc(){
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
