<?php

namespace Ads\Doctor\Controller\Home;

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
                'title' => '医生',
                'des'   => '医生',
                'ads'   => 'doctor/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '用户列表',
                        'ads'   => 'doctor/html/list',
                        'hidden'=> 0,
                        'sort'  =>30
                    ],
                    [ 'title' => '添加',
                        'des'   => '添加',
                        'ads'   => 'doctor/html/add',
                        'hidden'=> 0,
                    ],
                    [ 'title' => '修改',
                        'des'   => '修改',
                        'ads'   => 'doctor/html/edit',
                        'hidden'=> 1,
                    ],
                ]
            ]
        ];
        return $res;
    }

}
