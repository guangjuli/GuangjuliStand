<?php

namespace Ads\Bloodpress\Controller\Home;

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
                'title' => '测量数据',
                'des'   => '测量数据',
                'ads'   => 'bloodpress/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '患者列表',
                        'des'   => '患者列表',
                        'ads'   => 'bloodpress/html/list',
                        'hidden'=> 0,
                        'sort'  => 30
                    ],
                    [ 'title' => '数据统计',
                        'des'   => '数据统计',
                        'ads'   => 'bloodpress/html/statistics',
                        'hidden'=> 0,
                    ],
                ]
            ]
        ];
        return $res;
    }


}
