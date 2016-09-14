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
                'title' => '配置',
                'des'   => '配置',
                'ads'   => 'config/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '配置管理',
                        'des'   => '配置管理',
                        'ads'   => 'config/html/man',
                        'hidden'=> 0,
                    ],
                    [ 'title' => '系统配置',
                        'des'   => '系统配置',
                        'ads'   => 'config/html/list',
                        'hidden'=> 0,
                    ],
                    [ 'title' => '添加',
                        'des'   => '添加',
                        'ads'   => 'config/html/add',
                        'hidden'=> 0,
                    ],

                    [ 'title' => '编辑',
                        'des'   => '编辑',
                        'ads'   => 'config/html/edit',
                        'hidden'=> 1,
                    ],
                ]
            ]
        ];
        return $res;
    }
    
}
