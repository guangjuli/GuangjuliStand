<?php

namespace Ads\Devicetype\Controller\Home;

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
     * 返回版本
     */
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
