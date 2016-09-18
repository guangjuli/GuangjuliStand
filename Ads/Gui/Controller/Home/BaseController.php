<?php

namespace Ads\Gui\Controller\Home;

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
