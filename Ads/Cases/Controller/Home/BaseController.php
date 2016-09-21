<?php

namespace Ads\Cases\Controller\Home;

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
                'title' => '病历',
                'des'   => '病历',
                'ads'   => 'cases/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '用户列表',
                        'ads'   => 'cases/html/list',
                        'hidden'=> 0,
                        'sort' =>30
                    ],
                    [ 'title' => '添加',
                        'des'   => '添加',
                        'ads'   => 'cases/html/add',
                        'hidden'=> 0,
                    ],
                    [ 'title' => '修改',
                        'des'   => '修改',
                        'ads'   => 'cases/html/edit',
                        'hidden'=> 1,
                    ],
                    [ 'title' => '病历列表',
                        'des'   => '病历列表',
                        'ads'   => 'cases/html/detail',
                        'hidden'=> 1,
                    ],
                    [ 'title' => '病历',
                        'des'   => '病历',
                        'ads'   => 'cases/html/cases',
                        'hidden'=> 1,
                    ]
                ]
            ]
        ];
        return $res;
    }

}
