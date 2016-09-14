<?php

namespace Ads\User\Controller\Html;

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
            'user/html/getUserGroupMap',
            'user/html/isExistTable'
        ];
    }

    /**
     * @return array
     * 返回依赖关系
     */
    public function doDepend()
    {
        return [
            'Db::server',
            'Application::Validate'
        ];
    }

    public function doDependTable()
    {
        return [
            'Menu',
            'User',
        ];
    }

}
