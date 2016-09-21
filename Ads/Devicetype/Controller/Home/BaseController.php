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
                'title' => '设备类型',
                'des'   => '设备类型',
                'ads'   => 'devicetype/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '用户列表',
                        'ads'   => 'devicetype/html/list',
                        'hidden'=> 0,
                        'sort'  =>30
                    ],
                    [ 'title' => '添加',
                        'des'   => '添加',
                        'ads'   => 'devicetype/html/add',
                        'hidden'=> 0,
                    ],
                    [ 'title' => '修改',
                        'des'   => '修改',
                        'ads'   => 'devicetype/html/edit',
                        'hidden'=> 1,
                    ],
                ]
            ]
        ];
        return $res;
    }
}
