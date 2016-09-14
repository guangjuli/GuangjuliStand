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

    public function doVersion(){
        return '1.0';
    }

    /**
     * @return array
     * 返回依赖关系
     */
    public function doDepend()
    {
        return [
            'asdf',
            'asdf',
        ];
    }

    public function doDependTable()
    {
        return [
            'Menu'
        ];
    }

    public function doMenu()
    {

        $res = [
            [
                'title' => 'api列表',
                'des'   => 'api相关功能',
                'ads'   => 'api/home/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => 'api列表',
                        'des'   => 'api相关功能',
                        'ads'   => 'api/home/index',
                        'hidden'=> 0,
                    ],
                    [ 'title' => 'api列表',
                        'des'   => 'api相关功能',
                        'ads'   => 'api/home/index',
                        'hidden'=> 0,
                    ],
                ]
            ]
        ];
        return $res;
    }

}
