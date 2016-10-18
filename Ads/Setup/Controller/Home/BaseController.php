<?php

namespace Ads\Setup\Controller\Home;

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
                'title' => '数据管理',
                'des'   => '前端 : 设置',
                'ads'   => 'setup/home/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '数据[数据源]',
                        'des'   => '修改',
                        'ads'   => 'setup/html/list',
                        'hidden'=> 0,
                        'sort'=>7
                    ],
                    [ 'title' => '数据[引用查看]',
                        'des'   => '修改',
                        'ads'   => 'setup/html/yy',
                        'hidden'=> 0,
                        'sort'=>7
                    ],
                    [ 'title' => '数据FACEDE',
                        'des'   => '修改',
                        'ads'   => 'setup/html/facade',
                        'hidden'=> 0,
                        'sort'=>7
                    ],

                ]
            ]
        ];
        return $res;
    }

}
