<?php

namespace Ads\Organization\Controller\Home;

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
                'title' => '机构',
                'des'   => '管理菜单',
                'ads'   => 'organization/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '机构列表',
                        'ads'   => 'organization/html/list',
                        'hidden'=> 0,
                        'sort'  =>30
                    ],
                    [ 'title' => '添加',
                        'des'   => '添加',
                        'ads'   => 'organization/html/add',
                        'hidden'=> 0,
                    ],
                    [ 'title' => '修改',
                        'des'   => '修改',
                        'ads'   => 'organization/html/edit',
                        'hidden'=> 1,
                    ],
                ]
            ]
        ];
        return $res;
    }

}
