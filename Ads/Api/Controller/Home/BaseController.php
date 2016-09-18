<?php
namespace Ads\Api\Controller\Home;

//hook
class BaseController{

    public function __construct(){
    }

    /**
     * @return array
     * 返回可以调用的api
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
                    'title' => 'API管理',
                    'des'   => 'API管理',
                    'ads'   => 'api/html/index',
                    'hidden'=> 0,
                    'sort'  => 9,
                    'child' => [
                        [
                            'title' => 'API列表',
                            'des'   => 'API列表',
                            'ads'   => 'api/html/list',
                            'hidden'=> 0,
                            'sort'  => 9,
                        ],
                        [ 'title' => '添加',
                            'des'   => 'api相关功能',
                            'ads'   => 'api/html/add',
                            'hidden'=> 0,
                            'sort'  => 5,
                        ],
                        [ 'title' => '修改',
                            'des'   => 'api相关功能',
                            'ads'   => 'api/html/edit',
                            'hidden'=> 1,
                            'sort'  => 9,
                        ],
                        [
                            'title' => 'API日志',
                            'des'   => 'API日志',
                            'ads'   => 'api/html/log',
                            'hidden'=> 0,
                            'sort'  => 0,
                        ],                    ]
                ],

        ];
        return $res;
    }


}




