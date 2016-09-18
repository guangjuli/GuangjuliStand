<?php

namespace Ads\Pm\Controller\Home;

//hook
class BaseController{

    public function __construct(){
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
                'title' => '界面管理',
                'des'   => '界面管理',
                'ads'   => 'pm/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '列表',
                        'ads'   => 'pm/html/list',
                        'sort'=> 10,
                        'hidden'=> 0,
                    ],
                    [ 'title' => '设置',
                        'des'   => '模块设置',
                        'ads'   => 'pm/html/setup',
                        'sort'=> 8,
                        'hidden'=> 0,
                    ],
                ]
            ]
        ];
        return $res;
    }
    
}
